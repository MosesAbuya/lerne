<?php
session_start();

// Include the database connection
require_once '../includes/connection.php';

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Function to generate a CSRF token
function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // CSRF check
    if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        
        if (empty($username) || empty($password)) {
            $error = "Please enter both username and password.";
        } else {
            try {
                // PDO prepared statement for extreme security against SQL injection
                $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = :username LIMIT 1");
                $stmt->execute(['username' => $username]);
                $user = $stmt->fetch();

                // Verify the password securely using password_verify
                if ($user && password_verify($password, $user['password'])) {
                    // Prevent Session Fixation attacks
                    session_regenerate_id(true);
                    
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];

                    header('Location: index.php');
                    exit();
                } else {
                    $error = "Invalid username or password.";
                }
            } catch (Exception $e) {
                $error = "An error occurred. Please try again later.";
            }
        }
    } else {
        $error = "Security token validation failed. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Barrizi Organisation</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --admin-primary: #0B192C; /* Navy */
            --admin-secondary: #F37021; /* Orange */
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            display: flex;
        }
        .login-sidebar {
            background: linear-gradient(135deg, var(--admin-primary), #1a365d);
            color: #fff;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 45%;
        }
        .login-form-area {
            background: #fff;
            padding: 60px 50px;
            width: 55%;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #dee2e6;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: var(--admin-secondary);
        }
        .btn-login {
            background-color: var(--admin-secondary);
            color: #fff;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            border: none;
        }
        .btn-login:hover {
            background-color: #d15a15;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(243, 112, 33, 0.3);
        }
        
        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
                max-width: 450px;
                margin: 20px;
            }
            .login-sidebar { width: 100%; text-align: center; padding: 40px 20px; }
            .login-form-area { width: 100%; padding: 40px 30px; }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-sidebar">
            <div style="font-size: 3rem; color: var(--admin-secondary); margin-bottom: 20px;">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h2 class="fw-bold mb-3" style="font-family: var(--font-heading);">Barrizi Secure Admin</h2>
            <p style="color: rgba(255,255,255,0.8); line-height: 1.8;">
                Welcome back! Please sign in to access the control panel, manage content, and view analytics. All sessions are monitored for security.
            </p>
        </div>
        <div class="login-form-area">
            <h3 class="fw-bold mb-4" style="color: var(--admin-primary);">Sign In</h3>
            
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger" style="border-radius: 8px; font-size: 0.9rem;">
                    <i class="fas fa-exclamation-circle me-2"></i> <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                
                <div class="mb-4">
                    <label for="username" class="form-label text-muted fw-semibold">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                        <input type="text" class="form-control border-start-0 ps-0 bg-light" id="username" name="username" required placeholder="Enter username">
                    </div>
                </div>
                
                <div class="mb-5">
                    <label for="password" class="form-label text-muted fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" class="form-control border-start-0 border-end-0 ps-0 bg-light" id="password" name="password" required placeholder="Enter password">
                        <button class="btn btn-light border border-start-0 bg-light" type="button" id="togglePassword">
                            <i class="fas fa-eye text-muted" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-login w-100">Access Dashboard</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            togglePassword.addEventListener('click', function () {
                // Toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                // Toggle the eye / eye slash icon
                if (type === 'password') {
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye');
                } else {
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                }
            });
        });
    </script>
</body>
</html>
