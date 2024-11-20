<?php
    require_once("user_header.php");
    include "connection.php";
?>

<body>
    <div class="container">
        <div class="left">
            <p class="title">Edit your profile</p>
            <?php 
                $fName = $_SESSION['username'];

                $sql = "SELECT * FROM user WHERE fullName = '$fName'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) === 1){
                    $row = mysqli_fetch_assoc($result);
                }
            ?>
            <form action="user_profile.php" method="post">
                <div class="form-item">
                    <label for="fullName">Full Name: </label>
                    <input type="text" name="fullName" value="<?php echo $row['fullName'] ?>">
                </div>
                <div class="form-item">
                    <label for="email">Email: </label>
                    <input type="email" name="email" value="<?php echo $row['email'] ?>">
                </div>
                <div class="form-item">
                    <label for="gender">Gender: </label>
                    <select name="gender">
                        <option></option>
                        <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value = "Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="address">Address: </label>
                    <input type="text" name="address" value="<?php echo $row['address'] ?>">
                </div>
                <div class="form-item">
                    <label for="fullName">Mobile: </label>
                    <input type="text" name="mobile" value="<?php echo $row['mobile'] ?>">
                </div>
                <div class="for-item">
                    <input type="submit" name="update" value="Update">
                </div>
                <?php
                    if(isset($_POST['update'])){

                        $fullName = $_POST['fullName'];
                        $email = $_POST['email'];
                        $gender = $_POST['gender'];
                        $address = $_POST['address'];
                        $mobile = $_POST['mobile'];
                
                        $sql =  "UPDATE user 
                                SET fullName = '$fullName', email = '$email',  gender = '$gender', address = '$address', mobile = '$mobile' 
                                WHERE fullName = '$fullName'";
                
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            echo "Data Updated";
                        }
                    }
                ?>
            </form>
        </div>

        <div class="right">
            <p class="title">Change your password</p>
            <form action="user_profile.php" method="post">
                <div class="form-item">
                    <label for="password">Current Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-item">
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" id="new_password">
                </div>
                <div class="form-item">
                    <label for="rpt_password">Repeat Password:</label>
                    <input type="password" name="rpt_password" id="rpt_password">
                </div>
                <div class="form-item">
                    <input type="submit" name="change" value="Change">
                </div>
        </div>
        <?php
            if(isset($_POST['change'])){
                $password = $_POST['password'];
                $fullName = $_SESSION['username'];

                $sql = "SELECT password FROM user WHERE id = '{$row['id']}'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) === 1){
                    $row = mysqli_fetch_assoc($result);
                    if(password_verify($password, $row['password'])){
                        $new_password = $_POST['new_password'];
                        $rpt_password = $_POST['rpt_password'];

                        if($new_password === $rpt_password){
                            $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                            $sql = "UPDATE user SET password = '$password_hash' WHERE fullName = '$fullName'";

                            $result = mysqli_query($conn, $sql);
                            if($result){
                                echo "Password changed successfully";
                                exit;
                            }
                        }
                        else{
                            echo "Passwords do not match";
                            exit;
                        }
                    }
                }
                else{
                    echo "Invalid password";
                }
            }
        ?>
    </div>
</body>