<?php
    include 'connection.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
    
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $defaultUser = 'user';
    
        if(empty($email) || empty($password)){
            echo "Fill all fields";
            exit;
        }
    
        $sql = "INSERT INTO user(fullName, email, gender, password, address, mobile, role) 
                VALUES ('$fullName', '$email', '$gender', '$password_hash', '$address', '$mobile', '$defaultUser') ";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location:login.html");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,
        body,
        h1,
        h2,
        h3,
        h4 {
            font-family: "Lato", sans-serif
        }

        .mySlides {
            display: none
        }

        .w3-tag,
        .fa {
            cursor: pointer
        }

        .w3-tag {
            height: 15px;
            width: 15px;
            padding: 0;
            margin-top: 6px
        }
    </style>
</head>
<body>
    <div class="w3-center w3-padding-64" id="contact">
        <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">UoJ Startup Incubation Center</span>
    </div>
    <div class="w3-center w3-padding-64" id="contact">
        <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">User registration form</span>
    </div>

    <div class="w3-container">
        <form method="POST">
            <div class="w3-section">
                <label for="email">Full Name</label>
                <input class="w3-input w3-border w3-hover-border-blue" type="text" id="fullName" name="fullName">
            </div>
            <div class="w3-section">
                <label for="email">Email</label>
                <input class="w3-input w3-border w3-hover-border-blue" type="email" id="email" name="email">
            </div>
            <div class="w3-section">
                <label for="gender">Gender</label>
                <select name="gender" class="w3-input w3-border w3-hover-border-blue">
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="w3-section">
                <label for="password">Password</label>
                <input class="w3-input w3-border w3-hover-border-blue" type="password" minlength="8" name="password" id="password" required>
            </div>
            <div class="w3-section">
                <label for="address">Address</label>
                <input class="w3-input w3-border w3-hover-border-blue" type="text" name="address" id="address" required>
            </div>
            <div class="w3-section">
                <label for="mobile">Mobile</label>
                <input class="w3-input w3-border w3-hover-border-blue" type="text"  name="mobile" id="mobile" required>
            </div>
            <div class="w3-section">
                <input class="w3-button w3-block w3-blue" type="submit" name="signup" value="SignUp">
            </div>
        </form>
    </div>
</body>
</html>