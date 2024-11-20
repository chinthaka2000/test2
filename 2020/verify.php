<?php
    include 'connection.php';

    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_SESSION['username'] = "";
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(isset($_POST['signin'])){
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['fullName'];
                if($row['role'] === 'operator'){
                    if($password == $row['password']){
                        header("Location:operator.php");
                        exit;
                    }
                    else{
                        echo "Invalid password";
                    }
                }
                else{
                    if(password_verify($password, $row['password'])){
                        header("Location:user.php");
                        exit;
                    }
                    else{
                        echo "Invalid password";
                    }
                }
            }
            else{
                echo "Email not found";
            }
        }

        if(isset($_POST['signup'])){
            header("Location:signup.php");
            exit;
        }
    }
?>