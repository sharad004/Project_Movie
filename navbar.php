<!-- navbar.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
        
            background-color: #007BFF;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 16px;
        }
        .navbar a:hover {
            background-color: #0056b3;
            border-radius: 5px;
        }
        .navbar .brand {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="brand">
            <a href="#">MyWebsite</a>
        </div>
        <div>
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
        </div>
    </div>
</body>
</html>
