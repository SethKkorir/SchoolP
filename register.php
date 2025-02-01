<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <h2>Register</h2>
    <form id="registerForm" action="rapi.php" method="POST">
      <div class="form-group">
        <label for="username">Full Name:</label>
        <input type="text" id="username" name="username">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
      </div>
      <div class="form-group password-container">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span class="eye-icon" onclick="togglePassword('password')">👁️</span>
      </div>
      <div class="form-group password-container">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <span class="eye-icon" onclick="togglePassword('confirm_password')">👁️</span>
      </div>
      <div class="form-group">
        <label for="county">County:</label>
        <select id="county" name="county">
          <option value="">Select County</option>
          <option value="Wajir">Wajir</option>
          <option value="Garissa">Garissa</option>
          <option value="Mandera">Mandera</option>
          <option value="Isiolo">Isiolo</option>
          <option value="Marsabit">Marsabit</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Register" onclick="return validateForm()">
      </div>
      <div class="toggle-btn">
        <a href="login.php">Already have an account? Login</a>
      </div>
    </form>
  </div>

  <script>
    function togglePassword(id) {
      const passwordField = document.getElementById(id);
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
      } else {
        passwordField.type = 'password';
      }
    }

    function validateForm() {
      const username = document.getElementById('username').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm_password').value;

      // Check for empty fields
      if (username === "") {
        alert("Please enter your full name.");
        return false;  // Prevent form submission
      }
      const namePattern = /^[A-Za-z\s]+$/;
      if (!namePattern.test(username)) {
        alert("Full name must contain only letters and spaces.");
        return false;  // Prevent form submission
      }
      if (email === "") {
        alert("Please enter your email address.");
        return false;  // Prevent form submission
      }
      
      // Email validation: Check if email format is valid
      const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;  // Prevent form submission
      }
      if (password === "") {
        alert("Please enter a password.");
        return false;  // Prevent form submission
      }
      if (confirmPassword === "") {
        alert("Please confirm your password.");
        return false;  // Prevent form submission
      }

      // Passwords match validation
      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;  // Prevent form submission
      }

      // Password strength validation (simple check)
      if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;  // Prevent form submission
      }

      return true;  // Allow form submission if all checks pass
    }
  </script>
</body>
</html>
