<?php
require_once 'config.php';

// Insert Data
if(isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $county = $_POST['county'];

    // Validate that passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO users (username, email, password, county) 
            VALUES (:username, :email, :password, :county)";

    // Prepare the PDO statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters with values
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':county', $county);

    // Execute the prepared statement
    try {
        $stmt->execute();
        // After successful registration, show an alert and redirect to the login page
        echo "<script>alert('Registration successful. Please login.'); window.location.href='login.php';</script>";
        exit;
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>
