<?php
    require_once("operator_header.php");
    include "connection.php";

    $sql = "SELECT * FROM usersupport
            inner join user on usersupport.userId = user.id";
    $result = mysqli_query($conn, $sql);
?>

<head>

</head>
<body>
    <div class="container">
        <p>View Support Calls</p>
        <table class="support_call">
            <tr>
                <th>Date</th>
                <th>From</th>
                <th>Title</th>
                <th>Support type</th>
                <th>Action</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    $date = date($row['created_at']);
                    $from = $row['fullName'];
                    $title = $row['title'];
                    $support_type = $row['support_type'];
                    $id = $row['userId'];
                    echo "
                        <tr>
                            <td>$date</td>
                            <td>$from</td>
                            <td>$title</td>
                            <td>$support_type</td>
                            <td>
                                <form action='view.php?id=$id &title=$title' method='POST'>
                                    <input type='submit' name='view' value='View'>
                                </form>
                            </td>
                        </td>
                    ";
                }
            ?>
        </table>
    </div>
</body>