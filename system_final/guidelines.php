<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: landing.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: linear-gradient(to right bottom, #f6d774, #f6db7e, #f7e089, #f7e493, #f8e89d, #ecdb93, #e0cf89, #d4c27f, #b9a360, #9e8543, #836827, #694c08);
            color: #4b3d2e; 
            margin: 0;
            padding: 0;
            overflow: hidden; 
        }

        /* Container Styles */
        .container {
            background-color: rgba(7, 7, 7, 0.5); 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 90%; 
            max-width: 800px; 
            text-align: center;
            backdrop-filter: blur(5px); 
            border-radius: 10px; 
            margin: 50px auto; /* Center the container */
        }

        /* Navigation Bar Styles */
        nav {
            background-color: rgba(10, 10, 10, 0.58); 
            padding: 15px; 
            display: flex; 
            justify-content: space-evenly; 
            align-items: center;
            position: fixed; 
            width: 88%; 
            top: 5%; 
            border-radius: 10px;
            z-index: 1000; 
        }

        nav a {
            color: rgb(0, 255, 255); 
            text-decoration: none; 
            padding: 10px 15px; 
            border-radius: 5px; 
            transition: background-color 0.3s; 
        }

        nav a:hover {
            background-color: rgba(0, 255, 255, 0.5); 
            text-decoration: underline; 
        }

        /* Logout Link Styles */
        .logout-link {
            background-color: rgb(255, 0, 0); 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            transition: background-color 0.3s, color 0.3s; 
        }

        .logout-link:hover {
            background-color: rgb(200, 0, 0); 
            color: white; 
        }

        /* Heading Styles */
        h1 {
            color: white; 
            margin-bottom: 20px;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        input, textarea {
            width: 80%; 
            max-width: 400px; 
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.69);
            color: black;
        }

        input[type="submit"] {
            background-color: rgb(0, 255, 255);
            color: black;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: rgba(0, 255, 255, 0.7);
        }

        /* Additional Styles for Instructions */
        .instructions {
            text-align: left;
            margin: 20px 0;
            color: #fff;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <nav>
            <a href="home.php">Home</a>
            <a href="book.php">Book Appointment</a>
            <a href="items.php">Pet Essentials</a>
            <a href="guidelines.php">Pet Safety</a>
            <a href="contact.php">Contact</a>
            <a class="logout-link" href="logout.php">Logout</a>
        </nav>
        
        <h1>Instructions and Guidelines</h1>
        
        <div class="instructions">
            <p>If you are unable to book an appointment due to time constraints, please follow these steps:</p>
            <ul>
                <li>Contact our clinic directly via phone for immediate assistance.</li>
                <li>Describe your pet's symptoms clearly to our staff.</li>
                <li>Follow any emergency guidelines provided by our team.</li>
                <li>If necessary, bring your pet to the clinic for urgent care.</li>
            </ul>

            <h2>Emergency Guidelines</h2>
            <p>In case of an emergency, here are some guidelines to follow:</p>
            <ul>
                <li>Assess the situation and check for visible injuries or distress.</li>
                <li>Contact a veterinarian immediately for advice.</li>
                <li>If you have herbs that are known to be safe for pets (like chamomile), consult with a vet before using them.</li>
                <li>Transport your pet safely to the clinic if advised.</li>
            </ul>

            <h2>Do's and Don'ts About Pet Health</h2>
            <h3>Do's:</h3>
            <ul>
                <li>Schedule regular veterinary check-ups.</li>
                <li>Provide a balanced diet appropriate for your pet's age and health needs.</li>
                <li>Ensure your pet gets regular exercise.</li>
                <li>Keep vaccinations up to date.</li>
                <li>Monitor your pet's behavior for any changes.</li>
            </ul>

            <h3>Don'ts:</h3>
            <ul>
                <li>Don't ignore symptoms of illness.</li>
                <li>Don't feed pets human food that is toxic to them.</li>
                <li>Don't skip preventive care like flea and tick treatments.</li>
                <li>Don't give pets human medications without consulting a vet.</li>
                <li>Don't leave pets unattended in unfamiliar environments.</li>
            </ul>
        </div>
    </div>
   
</body>
</html>