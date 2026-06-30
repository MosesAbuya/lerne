<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Sign Up | Lerne Adams Foundation</title>
  <style>
      .auth-wrapper {
          min-height: 100vh;
          display: flex;
          align-items: center;
          background: linear-gradient(135deg, rgba(11, 25, 44, 0.9), rgba(61, 139, 55, 0.9)), url('images/lerne/activities/470215991_1813636732742251_1092272697177516536_n.jpg');
          background-size: cover;
          background-position: center;
          padding: 60px 0;
      }
      .auth-card {
          background: #fff;
          border-radius: var(--card-radius);
          padding: 50px;
          box-shadow: 0 20px 40px rgba(0,0,0,0.2);
          width: 100%;
          max-width: 600px;
          margin: 0 auto;
      }
      .auth-logo {
          text-align: center;
          margin-bottom: 20px;
      }
      .auth-logo img {
          height: 80px;
      }
      .auth-title {
          font-family: var(--font-heading);
          color: var(--laf-navy);
          text-align: center;
          margin-bottom: 30px;
      }
      .form-control {
          padding: 12px 20px;
          border-radius: 8px;
          border: 1px solid #e0e0e0;
          margin-bottom: 20px;
      }
      .form-control:focus {
          border-color: var(--laf-green);
          box-shadow: 0 0 0 3px rgba(61, 139, 55, 0.1);
      }
      @media(max-width: 768px) {
          .auth-card {
              padding: 30px 20px;
          }
      }
  </style>
</head>
<body>

  <div class="auth-wrapper">
      <div class="container">
          <div class="auth-card">
              <div class="auth-logo">
                  <a href="index">
                      <img src="images/lerne/logo/logo.png" alt="Lerne Adams Foundation">
                  </a>
              </div>
              <h2 class="auth-title">Create an Account</h2>
              
              <form id="contactForm" method="POST">
                  <div class="row">
                      <div class="col-sm-6">
                          <input type="text" class="form-control" name="first-name" id="first-name" placeholder="First Name" required>
                      </div>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" name="last-name" id="last-name" placeholder="Last Name" required>
                      </div>
                      <div class="col-12">
                          <input type="text" class="form-control" name="country" id="country" placeholder="Country" required>
                      </div>
                      <div class="col-12">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                      </div>
                      <div class="col-12">
                          <input type="text" class="form-control" name="organisation" id="organisation" placeholder="Organisation Name (Optional)">
                      </div>
                      <div class="col-sm-6">
                          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                      </div>
                      <div class="col-sm-6">
                          <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Confirm Password" required>
                      </div>
                  </div>
                  
                  <input type="hidden" name="package" id="package" value="Standard">
                  <input type="hidden" name="transaction_id" id="transaction_id">

                  <button type="submit" class="laf-btn laf-btn-green w-100 mt-2">Sign Up</button>
                  <p id="message" class="mt-3 text-center"></p>
              </form>
              
              <div class="text-center mt-4 pt-3 border-top">
                  <p class="text-muted small mb-0">Already have an account? <a href="signin" class="text-laf-orange fw-bold">Sign In</a></p>
                  <p class="text-muted small mt-2"><a href="index" class="text-laf-navy"><i class="fas fa-arrow-left me-1"></i> Back to Home</a></p>
              </div>
          </div>
      </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  function generateTransactionID(length = 10) {
      const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      let result = '';
      for (let i = 0; i < length; i++) {
          result += chars.charAt(Math.floor(Math.random() * chars.length));
      }
      return result;
  }
  
  $(document).ready(function() {
      $('#transaction_id').val(generateTransactionID());

      $('#contactForm').on('submit', function(event) {
          event.preventDefault();
          var password = $('#password').val();
          var confirmPassword = $('#confirm-password').val();

          if (password !== confirmPassword) {
              $('#message').text('Error: Passwords do not match!').css('color', 'red').show();
              return false;
          }

          var formData = $(this).serialize();

          $.ajax({
              url: 'signup_process.php',
              type: 'POST',
              data: formData,
              success: function(response) {
                  var messageElement = $('#message');
                  messageElement.show();
                  if (response.trim() === 'success') {
                      messageElement.text('Signup successful! Please sign in.').css('color', 'green');
                      setTimeout(function() {
                          window.location.href = 'signin.php';
                      }, 2000);
                  } else {
                      messageElement.text('Error: ' + response).css('color', 'red');
                  }
              },
              error: function() {
                  $('#message').text('There was an error submitting your form. Please try again.').css('color', 'red').show();
              }
          });
      });
  });
  </script>
</body>
</html>
