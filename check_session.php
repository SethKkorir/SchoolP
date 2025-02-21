<?php
session_start(); // Start the session

// Check if the user is logged in
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

// Return the result as JSON
header('Content-Type: application/json');
echo json_encode(['loggedIn' => $loggedIn]);
?>