<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the database connection
    require_once 'config.php'; // Make sure you have a config.php file with your DB credentials

    // Get form data
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];

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
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['email'] = $user['email']; // Store email in session

            // Redirect to the dashboard or protected page
            header('Location: index.html');
            exit;
        } else {
            // Invalid credentials
            $error_message = "Invalid email or password.";
            echo "<script>alert('$error_message');</script>";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
