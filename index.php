<?php
session_start(); // Start the session at the top of the file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LandLink: Empowering Dryland Communities</title>
    <style>
        /* Your CSS styles here (unchanged) */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #3f8a3e;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        header .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
        }

        header .logo img.logo-image {
            width: 150px;
            height: 150px;
            margin-bottom: 10px;
        }

        header h1 {
            font-size: 2em;
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.1em;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        #hero {
            background-image: url('Images/image.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            text-align: center;
            padding: 100px 0;
            color: white;
            position: relative;
        }

        #hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        #hero .container {
            position: relative;
            z-index: 2;
        }

        #hero h2 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        #hero p {
            font-size: 1.5em;
        }

        #features {
            padding: 50px 0;
            text-align: center;
            background-color: #fff;
        }

        .feature {
            display: inline-block;
            width: 30%;
            margin: 10px;
            color: white;
            text-align: center;
            border-radius: 8px;
            padding: 40px;
            background-size: cover;
            background-position: center;
        }

        .btn {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        footer {
            background-color: green;
            color: white;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
        }

        footer h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        footer ul li {
            margin-bottom: 10px;
        }

        footer ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1em;
        }

        footer ul li a:hover {
            text-decoration: underline;
            color: #ffdd57;
        }

        footer .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        footer .social-icons img {
            width: 40px;
            height: 40px;
            transition: transform 0.3s ease;
        }

        footer .social-icons img:hover {
            transform: scale(1.2);
        }

        footer .bottom-bar {
            text-align: center;
            padding-top: 10px;
            border-top: 1px solid green;
            margin-top: 20px;
            width: 100%;
        }

        footer > div {
            margin-bottom: 20px;
        }
    </style>
    <script>
        // Function to check if the user is logged in
        function checkLogin(page) {
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

            return false; // Prevent the default link behavior
        }
    </script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="Images\landlink logo (1).jpg" alt="LandLink Logo" class="logo-image">
        </div>
        <h1>LandLink: For Empowering Dryland Communities through Knowledge and Advocacy</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="land-rights.php" onclick="return checkLogin('land-rights.php')">Land Rights</a></li>
                <li><a href="water-management.php" onclick="return checkLogin('water-management.php')">Water Resource Management</a></li>
                <li><a href="livelihood-support.php" onclick="return checkLogin('livelihood-support.php')">Livelihood Support</a></li>
                <li><a href="register.php">Registration</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section id="hero">
        <div class="container">
            <h2>Empowering Dryland Communities through Knowledge and Advocacy</h2>
            <p>Access vital information on land rights, water resource management, and sustainable livelihoods to build resilience.</p>
        </div>
    </section>

    <section id="features">
        <div class="container">
            <div class="feature" style="background-image: url('Images/image copy 4.png');">
                <h3>Land Rights & Governance</h3>
                <p>Understand the Community Land Act 2016 and integrated land use planning.</p>
                <a href="land-rights.php" class="btn" onclick="return checkLogin('land-rights.php')">Learn More</a>
            </div>
            <div class="feature" style="background-image: url('Images/image copy 2.png');">
                <h3>Water Resource Management</h3>
                <p>Guidance on water resource sharing and sustainable management.</p>
                <a href="water-management.php" class="btn" onclick="return checkLogin('water-management.php')">Explore</a>
            </div>
            <div class="feature" style="background-image: url('Images/image copy 3.png');">
                <h3>Livelihood Support</h3>
                <p>Access drought resilience strategies and sustainable livestock production methods.</p>
                <a href="livelihood-support.php" class="btn" onclick="return checkLogin('livelihood-support.php')">Get Support</a>
            </div>
        </div>
    </section>

    <footer>
        <div>
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="land-rights.php" onclick="return checkLogin('land-rights.php')">Land Rights</a></li>
                <li><a href="water-management.php" onclick="return checkLogin('water-management.php')">Water Resource Management</a></li>
                <li><a href="livelihood-support.php" onclick="return checkLogin('livelihood-support.php')">Livelihood Support</a></li>
            </ul>
        </div>

        <div>
            <h3>Contact</h3>
            <ul>
                <li>
                    <img src="C:\Users\FAHIM\Desktop\SCHOOL PROJECT\Images\image copy 11.png" alt="Location Icon" style="width:30px; height:30px; vertical-align:middle;">
                    <a href="https://maps.app.goo.gl/R1c3SiY2yUwvmRis6" target="_blank">Our Location</a>
                </li>
                <li>
                    <img src="C:\Users\FAHIM\Desktop\SCHOOL PROJECT\Images\image copy 12.png" alt="Phone Icon" style="width:30px; height:30px; vertical-align:middle; margin-right:5px;">
                    Phone: 0748298329
                </li>
                <li>
                    <img src="C:\Users\FAHIM\Desktop\SCHOOL PROJECT\Images\image copy 13.png" alt="Email Icon" style="width:30px; height:30px; vertical-align:middle; margin-right:5px;">
                    Email: <a href="mailto:info@Dlci.org">info@Dlci-hoa.org</a>
                </li>
            </ul>
        </div>

        <div>
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com/DLCIHOA" target="_blank"> 
                    <img src="Images/image copy 8.png" alt="Facebook">
                </a>
                <a href="https://twitter.com/DLCIHOA" target="_blank">
                    <img src="Images/image copy 9.png" alt="Twitter">
                </a>
                <a href="https://www.linkedin.com/company/drylands-learning-and-capacity-building-initiative/" target="_blank">
                    <img src="Images/image copy 10.png" alt="LinkedIn">
                </a>
            </div>
        </div>

        <div class="bottom-bar">
            <p>&copy; 2024 LandLink. All Rights Reserved.</p>  
        </div>
    </footer>
</body>
</html>