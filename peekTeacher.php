
<?php 


	$host = "localhost";
	$user="root";
	$password="";
	$db="Hogwarts";

	$con=mysqli_connect("localhost","root","","Hogwarts");
	if($con === false)
	{
		echo "Connection failed to establish";
	}

	mysqli_select_db($con,$db);

	$sql="SELECT `id`, `fname`, `lname`, `phoneNo`, `gender`, `subject`, `email`, `class` FROM `Teacher`";
	$dataRow="";
	$result = mysqli_query($con,$sql);
	
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>peek teacher</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="Menu">
		<ul>
	 		<li><a class="active" href="process.php">Home</a></li>
	  		<li><a href="insert.php">Insert</a></li>
	  		<li><a href="update.php">Update</a></li>
	  		<li><a href="delete.php">Delete</a></li>
	  		<li><a href="peek.php">Peek</a></li>
		</ul>
	</div>

	<div class="loginbox" style="width: 700px">
	<img src="p2.png" class="avatar">
		<p style="padding-left: 210px; font-weight: bold; font-size: 7;"><h1>Teacher details</h1></p>
		<table align="center">
			<tr>
				<th>id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>phoneNo</th>
				<th>gender</th>
				<th>subject</th>
				<th>email</th>
				<th>class</th>
			</tr>
			<?php while($row1 = mysqli_fetch_array($result)):; ?>
				<tr>
					<td><?php echo$row1[0]; ?></td>
					<td><?php echo$row1[1]; ?></td>
					<td><?php echo$row1[2]; ?></td>
					<td><?php echo$row1[3]; ?></td>
					<td><?php echo$row1[4]; ?></td>
					<td><?php echo$row1[5]; ?></td>
					<td><?php echo$row1[6]; ?></td>
					<td><?php echo$row1[7]; ?></td>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
	<a href="login.php">
  		<img src="p3.png" alt="Logout" style="width:50px;height:42px;border:0;position: fixed;top: 8px;right: 16px;font-size: 18px;">
	</a>
</body>
</html>

