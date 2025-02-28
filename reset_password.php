<?php
session_start();
require_once 'config.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Check if the email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Update the user's password
        $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE email = :email");
        $stmt->bindParam(':password', $newPassword);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo "<script>alert('Your password has been reset successfully.'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Email not found.'); window.location.href = 'forgot_password.php';</script>";
    }
}
?>