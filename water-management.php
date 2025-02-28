<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Resource Management</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f5f5f5; 
            margin: 0; 
            padding: 0;
            background-image: url('Images/image copy 6.png'); /* Add the path to your background image */
            background-size: cover; /* Ensure the background covers the entire page */
            background-position: center; /* Center the background image */
        }
        header { 
            background-color: rgba(63, 138, 62, 0.8); /* Transparent background for better readability */
            color: white; 
            text-align: center; 
            padding: 15px; 
        }
        .content { 
            max-width: 800px; 
            margin: 20px auto; 
            background: white; 
            padding: 20px; 
            opacity: 0.9; /* Slight transparency to allow the background to show through */
        }
        h1, h2 { 
            color: #4caf50; 
        }
        a { 
            color: #4caf50; 
            text-decoration: none; 
        }
        .download-link {
            display: inline-block;
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .download-link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Water Resource Management</h1>
    </header>
    <div class="content">
        <h2>Resource Sharing and Management</h2>
        <p>Sustainable water use ensures equitable access and resilience against water shortages.</p>
        
        <!-- Download Link for the Water Resource Management PDF -->
        <p><a href="docs\Water_Resource_Sharing_Sustainable_Management.pdf" class="download-link" download>Download Water Resource Guide</a></p>
        
        <p><a href="index.php">Back to Home</a></p>
    </div>

    <!-- Add the JavaScript here -->
    <script>
        // Function to check if the user is logged in
        function checkLogin(page, event) {
            event.preventDefault(); // Prevent the default link behavior

            fetch('check_session.php') // Make an AJAX call to check the session
                .then(response => response.json())
                .then(data => {
                    if (data.loggedIn) {
                        // If logged in, redirect to the requested page
                        window.location.href = page;
                    } else {
                        // If not logged in, show an alert and redirect to the registration page
                        alert("You need to register or log in to access this page.");
                        window.location.href = "register.php?redirect=" + encodeURIComponent(page);
                    }
                })
                .catch(error => {
                    console.error('Error checking session:', error);
                });
        }

        // Attach event listeners to restricted links
        document.addEventListener('DOMContentLoaded', function () {
            const restrictedLinks = document.querySelectorAll('a.restricted');
            restrictedLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    checkLogin(this.href, event);
                });
            });
        });
    </script>
</body>
</html>