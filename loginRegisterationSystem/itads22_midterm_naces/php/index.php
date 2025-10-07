<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel ="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo"> Student Portal </div>
                <ul class="nav-links">
                    <li><a href="#">Home</li>
                    <li><a href="#">Add Student</li>
                    <li><a href="#">View Student</li>
                    <li><a href="#">Log in</li>
                </ul>
            
        </nav>
    </header>
    <main>
        <h1>Add a New Student</h1>
        <form action="php/add_student.php">
            <label for="f_name">First Name: </label>
            <input type="text" id="f_name" name="f_name" required>

            <label for="m_name">Middle Name: </label>
            <input type="text" id="m_name" name="m_name" required>

            <label for="l_name">Last Name:</label>
            <input type="text" id="l_name" name="l_name" required>

            
            <label for="address">Address: </label>
            <input type="text" id="address" name="address" required>

            <label for="email_address"> Email: </label>
            <input type="text" id="email_address" name="email_address" required>

            <label for="data_enrolled"></label>
            <input type="text" id="data_enrolled" name="data_enrolled" required>

            <button type="submit">Add Student</button>
        </form>
    </main>
</body>
<footer>&copy; Developers: <br> MARIE ANJILEE NACES </footer>
</html>