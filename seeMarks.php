
<?php 

	session_start();
	$ID = $_SESSION['ID'];
	$_SESSION['ID']=$ID;
	$class = $_SESSION['class'];

	$host="localhost";
	$user="root";
	$password="";
	$db="Hogwarts";

	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,$db);


	
	$sql="SELECT `Sid`, `History`, `Transfiguration`, `DADA`, `Potions`, `Percentage` FROM `Marks` WHERE Sid = $ID";
	$result = mysqli_query($con,$sql);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>See marks</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="Menu">
		<ul>
	 		<li><a class="active" href="studentAccount.php">Home</a></li>
		</ul>
	</div>
	<div class="loginbox" style="width: 550px;">
		<img src="p2.png" class="avatar">
		<p style="padding-left: 210px; font-weight: bold; font-size: 7;"><h1>Marks</h1></p>
		<table align="center">
			<tr>
				<th>Sid</th>
				<th>Name</th>
				<th>History</th>
				<th>Transfiguration</th>
				<th>DADA</th>
				<th>Potions</th>
				<th>Percentage</th>
			</tr>
			<?php while($row1 = mysqli_fetch_array($result)):; ?>
				<tr>
					<td><?php echo $row1[0]; ?></td>
					<?php $query1="SELECT `fname`, `lname` FROM `Student` WHERE id = $row1[0]";
						$result1 = $con->query($query1);
						if ($result1->num_rows > 0)
						{
							while($row = $result1->fetch_assoc())
							{
								$fname=$row['fname'];
								$lname=$row['lname'];
							}
    					} ?>
    					<td><?php echo "$fname $lname"; ?></td>
					<td><?php echo$row1[1]; ?></td>
					<td><?php echo$row1[2]; ?></td>
					<td><?php echo$row1[3]; ?></td>
					<td><?php echo$row1[4]; ?></td>
					<td><?php echo$row1[5]; ?></td>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
	<a href="login.php">
  		<img src="p3.png" alt="Logout" style="width:50px;height:42px;border:0;position: fixed;top: 8px;right: 16px;font-size: 18px;">
	</a>
</body>
</html>