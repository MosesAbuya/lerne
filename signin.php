<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Sign In | Lerne Adams Foundation</title>
  <style>
      .auth-wrapper {
          min-height: 100vh;
          display: flex;
          align-items: center;
          background: linear-gradient(135deg, rgba(11, 25, 44, 0.9), rgba(61, 139, 55, 0.9)), url('images/lerne/activities/473365074_1837315983707659_3696841068555528541_n.jpg');
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
          max-width: 500px;
          margin: 0 auto;
      }
      .auth-logo {
          text-align: center;
          margin-bottom: 30px;
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
      .forgot-password {
          font-size: 0.9rem;
          color: var(--laf-orange);
          text-decoration: none;
          display: block;
          text-align: right;
          margin-top: -10px;
          margin-bottom: 20px;
      }
      .forgot-password:hover {
          color: var(--laf-navy);
      }
      /* Modal */
      .modal {
          display: none;
          position: fixed;
          z-index: 1050;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgba(0,0,0,0.5);
      }
      .modal-content {
          background-color: #fefefe;
          margin: 10% auto;
          padding: 30px;
          border-radius: var(--card-radius);
          width: 90%;
          max-width: 400px;
      }
      .close {
          color: #aaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
          cursor: pointer;
      }
      .close:hover {
          color: #000;
      }
  </style>
</head>
<body>

  <!-- The Sign In wrapper is standalone to act as a proper auth screen -->
  <div class="auth-wrapper">
      <div class="container">
          <div class="auth-card">
              <div class="auth-logo">
                  <a href="index">
                      <img src="images/lerne/logo/logo.png" alt="Lerne Adams Foundation">
                  </a>
              </div>
              <h2 class="auth-title">Sign In</h2>
              
              <form id="contactForm" method="post">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                  
                  <a href="#" id="forgotPasswordBtn" class="forgot-password">Forgot Password?</a>
                  
                  <button type="submit" class="laf-btn laf-btn-green w-100">Sign In</button>
                  <p id="message" class="mt-3 text-center"></p>
              </form>
              
              <div class="text-center mt-4 pt-3 border-top">
                  <p class="text-muted small mb-0">Don't have an account? <a href="signup" class="text-laf-green fw-bold">Sign Up</a></p>
                  <p class="text-muted small mt-2"><a href="index" class="text-laf-navy"><i class="fas fa-arrow-left me-1"></i> Back to Home</a></p>
              </div>
          </div>
      </div>
  </div>

  <!-- Forgot Password Modal -->
  <div id="forgotPasswordModal" class="modal">
      <div class="modal-content">
          <span class="close" id="closeModal">&times;</span>
          <h4 class="font-heading mb-3">Reset Password</h4>
          <p class="text-muted small mb-3">Enter your email address and we'll send you a link to reset your password.</p>
          <form id="forgotPasswordForm">
              <input type="email" class="form-control" id="resetEmail" name="resetEmail" placeholder="Email Address" required>
              <button type="submit" class="laf-btn laf-btn-orange w-100">Send Reset Link</button>
          </form>
          <p id="modalMessage" class="mt-3 text-center small"></p>
      </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  // Modal logic
  document.getElementById('forgotPasswordBtn').onclick = function(e) {
      e.preventDefault();
      document.getElementById('forgotPasswordModal').style.display = 'block';
  };
  document.getElementById('closeModal').onclick = function() {
      document.getElementById('forgotPasswordModal').style.display = 'none';
  };
  window.onclick = function(event) {
      let modal = document.getElementById('forgotPasswordModal');
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }

  // Handle Forgot Password Submission
  $('#forgotPasswordForm').on('submit', function(e) {
      e.preventDefault();
      let email = $('#resetEmail').val();
      $.ajax({
          url: 'forgot_password.php',
          type: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({ email: email }),
          success: function(response) {
              try {
                  let data = JSON.parse(response);
                  $('#modalMessage').text(data.message).css('color', 'green');
              } catch(e) {
                  $('#modalMessage').text(response).css('color', 'green');
              }
          },
          error: function() {
              $('#modalMessage').text('An error occurred.').css('color', 'red');
          }
      });
  });

  // Handle Login Submission
  $(document).ready(function() {
      $('#contactForm').on('submit', function(event) {
          event.preventDefault();
          var email = $('#email').val();
          var password = $('#password').val();

          if (email == '' || password == '') {
              $('#message').text("Please fill in all fields!").css('color', 'red');
              return;
          }

          var formData = $(this).serialize();

          $.ajax({
              url: 'signin_process.php',
              type: 'POST',
              data: formData,
              success: function(response) {
                  var messageElement = $('#message');
                  messageElement.show();
                  
                  if (response.trim() === 'success') {
                      messageElement.text('Login successful!').css('color', 'green');
                      window.location.href = 'admin/dashboard.php'; // changed to typical admin dashboard path
                  } else {
                      messageElement.text('Error: ' + response).css('color', 'red');
                  }
              },
              error: function() {
                  $('#message').text('Error submitting the form. Please try again.').css('color', 'red');
              }
          });
      });
  });
  </script>
</body>
</html>
