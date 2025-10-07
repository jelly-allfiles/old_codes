<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]
!== true) {
header("location: login.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
<style>
    body {
            font-family: Outfit, sans-serif;
            background-color: #16161a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white;
            flex-direction: column;
        }

        h1 {
            font-size: 50px;
            color: white;
            font-weight: bold;
            margin-bottom: 20px; 
            text-align: center; 
            animation: slideUp 1.5s ease-out forwards;
        }

        @keyframes slideUp {
            0% {
                transform: translateY(70px); /* Start below the screen */
                opacity: 0; /* Invisible at the start */
            }
            100% {
                transform: translateY(0); /* Final position */
                opacity: 1; /* Fully visible */
            }
        }

        a {
            background-color: #7f5af0;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-family: Outfit, sans-serif;
            text-decoration: none;
            text-align: center;
            opacity: 0;
            animation: fadeIn 2s ease-out 1s forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0; /* Invisible at the start */
            }
            100% {
                opacity: 1; /* Fully visible */
            }
        }

        a:hover {
            background-color: #2cb67d;
        }

</style>
</head>
<body>
<h1>Welcome to my WebApp <?php echo $_SESSION["username"]; ?>!</h1>
<a href="logout.php">Logout</a>
</body>
</html>