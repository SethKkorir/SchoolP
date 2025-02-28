<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the database connection
    require_once 'config.php'; // Ensure this file contains your database credentials

    // Get form data
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];

    // Validate inputs (ensure they are not empty)
    if (empty($email) || empty($password)) {
        $error_message = "Email and password are required.";
        echo "<script>alert('$error_message'); window.location.href = 'login.php';</script>";
        exit;
    }

    // Query the database for a matching email
    $sql = "SELECT * FROM users WHERE email = :email"; // Assuming your users table is named 'users'
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);

    try {
        // Execute the query and fetch the user data
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // If a user was found and the password is correct
        if ($user && password_verify($password, $user['password'])) {
            // Successful login
            $_SESSION['loggedin'] = true; // Set the logged-in status
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['email'] = $user['email']; // Store email in session

            // Redirect to the dashboard or protected page
            header('Location: index.php');
            exit;
        } else {
            // Invalid credentials
            $error_message = "Invalid email or password.";
            echo "<script>alert('$error_message'); window.location.href = 'login.php';</script>";
            exit;
        }
    } catch (PDOException $e) {
        // Handle database errors
        $error_message = "Database error: " . $e->getMessage();
        echo "<script>alert('$error_message'); window.location.href = 'login.php';</script>";
        exit;
    }
} else {
    // Invalid request method
    $error_message = "Invalid request method.";
    echo "<script>alert('$error_message'); window.location.href = 'login.php';</script>";
    exit;
}
?>