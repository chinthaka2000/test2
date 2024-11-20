<?php
    include "connection.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $subject = $_POST['Subject'];
        $message = $_POST['Message'];

        if(empty($name) || empty($email) || empty($subject) || empty($message)){
            echo "Please fill all the fields";
        }

        if(isset($_POST['send'])){
            $sql = "INSERT INTO contact(name, email, subject, message, created_date) VALUES ('$name', '$email', '$subject', '$message', NOW())";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "Message successfully sent";
                header("Location:index.html");
                exit;
            }
        }
    }

?>