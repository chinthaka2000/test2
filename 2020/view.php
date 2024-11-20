<?php
	include "connection.php";
	require_once("operator_header.php");
	$id = $_GET['id'];
	$title = $_GET['title'];

	$sql = "SELECT * FROM usersupport INNER JOIN user ON usersupport.userID = user.id WHERE user.id = '$id' 
			AND usersupport.title = '$title'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
?>
<head>
</head>
<body>
	<p>View Support Calls</p>
	<table class='view-item'>
		<tr>
			<td><b>Date</b></td>
			<td><?php echo $row['created_at'] ?></td>
		</tr>
		<tr>
			<td><b>From</b></td>
			<td><?php echo $row['fullName'] ?></td>
		</tr>
		<tr>
			<td><b>Mobile</b></td>
			<td><?php echo $row['mobile'] ?></td>
		</tr>
		<tr>
			<td><b>Title</b></td>
			<td><?php echo $row['title'] ?></td>
		</tr>
		<tr>
			<td><b>Detail</b></td>
			<td><?php echo $row['details']?></td>
		</tr>
	</table>
</body>