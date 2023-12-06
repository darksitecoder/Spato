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

        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .notification {
            position: relative;
        }

        .notification-icon {
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            padding: 4px 8px;
            border-radius: 50%;
            font-size: 12px;
        }
    </style>
</head>
<body>

<nav>
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
    <div class="notification">
        <span class="notification-icon">&#128276;</span>
        <span class="badge">3</span>
    </div>
</nav>

<!-- Your page content goes here -->

</body>
</html>
        