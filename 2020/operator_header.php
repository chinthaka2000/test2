<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="user_style.css">
</head>
<body>
<div class="header">
        <span>UoJ Startup Incubation Center</span>
        <a href="logout.php"><?php echo $_SESSION['username'] ?> (logout)</a>
    </div>
    <div class="nav-links">
        <a href="support_call.php">Support Calls</a>
        <a href="project_management.php">Projects</a>
        <a href="guest_messages.php">Guest Messages</a>
    </div>
</body>
</html>