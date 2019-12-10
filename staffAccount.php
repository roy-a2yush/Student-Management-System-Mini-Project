<?php 

session_start();

$host="localhost";
$user="root";
$password="";
$db="Hogwarts";

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,$db);


	$ID = $_SESSION['ID'];
	$sql="SELECT * FROM `Staff` WHERE id = $ID";
	$result = $con->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$fname=$row['fname'];
			$lname=$row['lname'];
			$phoneNo=$row['phoneNo'];
			$gender=$row['gender'];
			$deptAlloted=$row['deptAlloted'];
			$salary=$row['salary'];
			$username=$row['username'];
		}
    }
    $_SESSION['username']=$username;
    $_SESSION['ID']=$ID;
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Staff Account</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="loginbox" style=" width: 500px;">
		<img src="p2.png" class="avatar">
		<h1>Welcome <strong><?php echo "$fname $lname" ?></strong></h1>
		<h4>The department Alloted to you is <?php echo $deptAlloted ?></h4>
		<br>
		<form action="#" method="POST">
			<input type="submit" name="Marks" value="See all details" formaction="seeDetails.php">
			<input type="submit" name="change" value="Change password" formaction="changeStaff.php">
		</form>
	</div>
	<a href="login.php">
  		<img src="p3.png" alt="Logout" style="width:50px;height:42px;border:0;position: fixed;top: 8px;right: 16px;font-size: 18px;">
	</a>
</body>
</html>