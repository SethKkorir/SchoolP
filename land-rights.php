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
    <title>Land Rights & Governance</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: #f5f5f5; 
            background-image: url('Images/image copy 5.png'); /* Add your background image here */
            background-size: cover; /* Make the background cover the entire page */
            background-position: center; /* Center the background image */
        }
        header { 
            background-color: rgba(63, 138, 62, 0.8); /* Adding a transparent background to header for better readability */
            color: white; 
            padding: 15px; 
            text-align: center; 
        }
        .content { 
            max-width: 800px; 
            margin: 20px auto; 
            padding: 20px; 
            background: white; 
            opacity: 0.9; /* Slightly transparent content box for better background visibility */
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
        <h1>Land Rights & Governance</h1>
    </header>
    <div class="content">
        <h2>Understanding the Community Land Act 2016</h2>
        <p>The Community Land Act 2016 is a landmark legislation that ensures the protection and management of community land in Kenya. It grants legal recognition to community land ownership and promotes inclusive governance, enabling communities to secure tenure and sustainably manage their land resources. The Act also emphasizes the equitable distribution of land, ensuring that community members, especially women and marginalized groups, are involved in decision-making processes..</p>
        
        <h2>Integrated Land Use Planning</h2>
        <p>Integrated land use planning is crucial for balancing economic development with environmental conservation. It fosters sustainable practices that consider land, water, and biodiversity, ensuring that communities benefit from natural resources while preserving them for future generations. Effective planning supports resilience and equitable growth by preventing over-exploitation and ensuring long-term sustainability..</p>
        
        <!-- Download Link for the Land Rights PDF -->
        <p><a href="docs/community_land_rights_guide_complete.pdf" class="download-link" download>Download Land Rights Guide</a></p>
        
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
                        window.location.href = "land-rights.php";
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