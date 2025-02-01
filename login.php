<?php
session_start(); // Start the session at the top
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }
    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      font-size: 14px;
      margin-bottom: 5px;
      display: block;
    }
    .form-group input, .form-group select {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .form-group input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }
    .form-group input[type="submit"]:hover {
      background-color: #0056b3;
    }
    .toggle-btn {
      text-align: center;
      margin-top: 15px;
    }
    .toggle-btn a {
      color: #007bff;
      text-decoration: none;
    }
    .toggle-btn a:hover {
      text-decoration: underline;
    }
    .password-container {
      position: relative;
    }
    .eye-icon {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Login</h2>
    <form id="loginForm" action="lapi.php" method="POST" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="login-email">Email:</label>
        <input type="email" id="login-email" name="login-email" required>
      </div>
      <div class="form-group password-container">
        <label for="login-password">Password:</label>
        <input type="password" id="login-password" name="login-password" required>
        <span class="eye-icon" onclick="togglePassword('login-password')">👁️</span>
      </div>
      <div class="form-group">
        <input type="submit" value="Login">
      </div>
      <div class="toggle-btn">
        <a href="register.php">Don't have an account? Register</a>
      </div>
    </form>
  </div>

  <?php
  // Check if registration success message is set
  if (isset($_SESSION['registration_success'])) {
      echo "<script>alert('" . $_SESSION['registration_success'] . "');</script>";
      unset($_SESSION['registration_success']);
  }
  ?>

  <script>
    // Toggle password visibility
    function togglePassword(id) {
      const passwordField = document.getElementById(id);
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
      } else {
        passwordField.type = 'password';
      }
    }

    // Validate form fields
    function validateForm() {
      const email = document.getElementById('login-email').value;
      const password = document.getElementById('login-password').value;

      // Email validation
      const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
      }

      // Password validation (ensure it's not empty)
      if (password.trim() === "") {
        alert("Password is required.");
        return false;
      }

      return true;
    }
  </script>
</body>
</html>
