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
            $idea = $_POST['idea'];
            $image = null;

            $sql = "INSERT INTO userproject(userId, project_title, project_idea, image) 
                    VALUES('$uid', '$title', '$idea', '$image')";
            $result = mysqli_query($conn, $sql);

            if($result){
                $_SERVER['success'] = "Query received successfully";
            }

            header("Location:user_project.php");
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
    <p>Project Description</p>
    <div class="container">
        <form action="user_project.php" method="POST">
            <div class="form-item">
                <label for="title">Project Title: </label>
                <input type="text" id="title" name="title">
            </div>
            <div class="form-item">
                <label for="idea">Write about your idea: </label>
                <textarea name="idea"></textarea>
            </div>
            <div class="form-item">
                <label for="image">Upload your business model image: </label>
                <input type="file" name="image" id="image" accept="image/*" >
            </div>
            <div class="from-item">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>