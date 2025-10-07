<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$conn = new mysqli("localhost", "root",
"", "client_db");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"],
PASSWORD_DEFAULT); 

$sql = "INSERT INTO client (firstname, lastname, username, email, password)
VALUES ('$firstname','$lastname','$username', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <title>Registration & Login Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit';
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background:#FFA91A;
        }

        .container {
            width: 400px;
            background: #FFFFF0;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        h1 {
        color: #020271;
        font-size: 24px;
        margin-top: 0; /* Remove extra top margin */
        
}

        .input-box {
            position: relative;
            margin: 15px 0;
        }

        .input-box input {
            width: 100%;
            padding: 12px 40px 12px 15px;
            border: 1px solid #020271;
            border-radius: 5px;
            font-size: 14px;
            background-color: #fcfcf7;
        }

        .input-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #020271;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #020271;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
        background: #B70002;
        color: white;  
        transition: 0.3s ease-in-out;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .social-icons a {
            display: inline-flex;
            padding: 10px;
            border: 2px solid #020271;
            border-radius: 50%;
            color: #333;
            text-decoration: none;
            margin: 0 5px;
        }

        .social-icons a:hover {
            background: #eee;
        }

        .switch {
            margin-top: 15px;
            font-size: 14px;
        }

        .switch a {
            color: #B70002;
            text-decoration: none;
            font-weight: bold;
        }
        
        .logo {
        width: 150px;
        height: 150px;
        display: block;
        margin: 0 auto;  
        z-index: 1;    
}
    </style>
</head>
<body>
<div class = "container">
    <div class="form-box register">
        <img src = "content://com.android.providers.media.documents/document/image%3A1000043347" class="logo">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <h1>Registration</h1>
                <div class="input-box">
                    <input type="text" name="firstname" placeholder="First Name" required>
                    <i class=' bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="lastname" placeholder="Last Name" required>
                    <i class=' bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class=' bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <input type="hidden" name="action" value="register">
                <button type="submit" class="btn">Register</button><br>
               <br><p>-- or register with your social platform --</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                </div>
            </form>
        </div>
</div>
</body>
</html>