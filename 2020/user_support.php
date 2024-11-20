<?php
    include "connection.php";
    require_once("user_header.php");

    $_SERVER['success'] = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['submit'])){
            $fullName = $_SESSION['username'];

            $sql = "SELECT id FROM user WHERE fullName = '$fullName'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $uid = $row['id'];

            $title = $_POST['title'];
            $support_type = $_POST['support_type'];
            $details = $_POST['details'];

            $sql = "INSERT INTO usersupport(userId, title, support_type, details) 
                    VALUES('$uid', '$title', '$support_type', '$details')";
            
            $result = mysqli_query($conn, $sql);
            if($result){
                $_SERVER['success'] = "Query received successfully";
            }
            header("Location:user_support.php");
            echo $_SERVER['success'];
            exit;
        }

    }
?>
<head>
    <style>
        body {
            align-items: center;
        }
        .container{
            display:flex;
            flex-direction: row;
        }
        .form-item{
            margin:10px;
            align-items: center;
        }
    </style>
</head>
<body>
    <p>Need support?</p>
    <div class="container">
        <form action="user_support.php" method="POST">
            <div class="form-item">
                <label for="title">Title</label>
                <input type="text" id="title" name="title">
            </div>
            <div class="form-item">
                <label for="type">Type</label>
                <select name="support_type">
                    <option>Technical Support</option>
                    <option>Financial Support</option>
                    <option>Material Support</option>
                    <option>Marketing Support</option>
                </select>
            </div>
            <div class="form-item">
                <label for="details">Details</label>
                <textarea name="details"></textarea>
            </div>
            <div class="form-item">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>