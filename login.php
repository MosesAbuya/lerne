<?php include 'includes/session.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<?php
  if(isset($_SESSION['user'])){
    
    header('location: cart_view.php');
  }
?>
<?php include 'includes/head.php'; ?>
<?php include 'includes/preloader.php'; ?>
<header>
    <?php include 'includes/navbar.php'; ?>
</header>



<body class=" body hold-transition login-page">
    <div class="login-box">
        <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="verify.php" method="POST">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn " name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                    </div>
                </div>
            </form>
            <br>
            <a href="password_forgot" class="cen">I forgot my password</a><br>
            <a href="signupdiv" class="text-center cen1">Register a new membership</a><br>
            <a href="index"><i class="fa fa-home cen2"></i> Home</a>
        </div>
    </div>

    <?php include 'includes/scripts.php' ?>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/script.php'; ?>
</body>

</html>
