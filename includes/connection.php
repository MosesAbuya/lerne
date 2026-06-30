<?php
// Include credentials
require_once __DIR__ . '/db_credentials.php';

// Connect to the database using mysqli
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
    // Log error in production, but for now we die with a clean message
    error_log("Database Connection Error: " . mysqli_connect_error());
    die("Database connection failed. Please contact the administrator.");
}

// Set charset to utf8mb4 for proper character encoding (including emojis)
mysqli_set_charset($connection, "utf8mb4");

// For backward compatibility across the codebase where $pdo is used
class MyPDOStatement {
    private $stmt;
    private $result;
    
    public function __construct($stmt) {
        $this->stmt = $stmt;
    }
    
    public function execute($params = null) {
        if ($this->stmt === false) return false;
        if ($params) {
            $types = '';
            foreach ($params as $param) {
                if (is_int($param)) $types .= 'i';
                elseif (is_float($param)) $types .= 'd';
                else $types .= 's';
            }
            mysqli_stmt_bind_param($this->stmt, $types, ...$params);
        }
        $res = mysqli_stmt_execute($this->stmt);
        if ($res) {
            $this->result = mysqli_stmt_get_result($this->stmt);
        }
        return $res;
    }
    
    public function fetchAll($mode = null) {
        if (!$this->result) return [];
        return mysqli_fetch_all($this->result, MYSQLI_ASSOC);
    }
    
    public function fetch($mode = null) {
        if (!$this->result) return false;
        return mysqli_fetch_assoc($this->result);
    }
    
    public function fetchColumn($column = 0) {
        if (!$this->result) return false;
        $row = mysqli_fetch_row($this->result);
        return $row !== null ? $row[$column] : false;
    }
    
    public function rowCount() {
        if ($this->stmt === false) return 0;
        return mysqli_stmt_affected_rows($this->stmt);
    }
}

class MyPDO {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function prepare($sql) {
        $stmt = mysqli_prepare($this->conn, $sql);
        return new MyPDOStatement($stmt);
    }
    
    public function query($sql) {
        $result = mysqli_query($this->conn, $sql);
        if ($result === false) return false;
        // If it's a SELECT, return a mock statement that has a result
        $mockStmt = new MyPDOStatement(null);
        // We use reflection/closure to set private result property, or just make it public.
        // Actually, let's just make it simpler by adding a setResult method.
        return $mockStmt;
    }
    
    public function exec($sql) {
        mysqli_query($this->conn, $sql);
        return mysqli_affected_rows($this->conn);
    }
    
    public function lastInsertId() {
        return mysqli_insert_id($this->conn);
    }
}

// We need to fix the query() method in MyPDO to correctly set the result.
class MyPDOStatementWrapper {
    private $result;
    public function __construct($result) { $this->result = $result; }
    public function fetchAll() { return $this->result ? mysqli_fetch_all($this->result, MYSQLI_ASSOC) : []; }
    public function fetch() { return $this->result ? mysqli_fetch_assoc($this->result) : false; }
    public function fetchColumn() { 
        if(!$this->result) return false;
        $row = mysqli_fetch_row($this->result);
        return $row ? $row[0] : false;
    }
    public function rowCount() { return $this->result ? mysqli_num_rows($this->result) : 0; }
}

class MyPDOFinal {
    private $conn;
    public function __construct($conn) { $this->conn = $conn; }
    public function prepare($sql) {
        // Convert named parameters :name to ? since mysqli doesn't support named parameters natively
        // BUT wait! Some admin scripts use :name! We must support named params!
        // This is getting complicated... Let's use preg_replace.
        return new MyPDOStatementFinal($this->conn, $sql);
    }
    public function query($sql) {
        $res = mysqli_query($this->conn, $sql);
        return new MyPDOStatementWrapper($res);
    }
    public function exec($sql) {
        mysqli_query($this->conn, $sql);
        return mysqli_affected_rows($this->conn);
    }
    public function lastInsertId() { return mysqli_insert_id($this->conn); }
}

class MyPDOStatementFinal {
    private $conn;
    private $sql;
    private $stmt;
    private $result;
    private $paramNames = [];
    
    public function __construct($conn, $sql) {
        $this->conn = $conn;
        // Extract :names and replace with ?
        $this->sql = preg_replace_callback('/:([a-zA-Z0-9_]+)/', function($matches) {
            $this->paramNames[] = $matches[1];
            return '?';
        }, $sql);
        $this->stmt = mysqli_prepare($this->conn, $this->sql);
    }
    
    public function execute($params = null) {
        if (!$this->stmt) return false;
        if ($params) {
            $bindParams = [];
            $types = '';
            // If associative array
            if (!empty($this->paramNames)) {
                foreach ($this->paramNames as $name) {
                    $val = $params[$name] ?? ($params[":$name"] ?? null);
                    $bindParams[] = $val;
                    $types .= (is_int($val) ? 'i' : (is_float($val) ? 'd' : 's'));
                }
            } else {
                foreach ($params as $param) {
                    $bindParams[] = $param;
                    $types .= (is_int($param) ? 'i' : (is_float($param) ? 'd' : 's'));
                }
            }
            if (!empty($bindParams)) {
                mysqli_stmt_bind_param($this->stmt, $types, ...$bindParams);
            }
        }
        $res = mysqli_stmt_execute($this->stmt);
        if ($res) {
            $this->result = mysqli_stmt_get_result($this->stmt);
        }
        return $res;
    }
    
    public function fetchAll() { return $this->result ? mysqli_fetch_all($this->result, MYSQLI_ASSOC) : []; }
    public function fetch() { return $this->result ? mysqli_fetch_assoc($this->result) : false; }
    public function fetchColumn() { 
        if(!$this->result) return false;
        $row = mysqli_fetch_row($this->result);
        return $row ? $row[0] : false;
    }
    public function rowCount() { return mysqli_stmt_affected_rows($this->stmt); }
}

$pdo = new MyPDOFinal($connection);
?>