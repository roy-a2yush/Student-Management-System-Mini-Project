<?php 

session_start();

$host="localhost";
$user="root";
$password="";
$db="Hogwarts";

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,$db);


	$ID = $_SESSION['ID'];
	$sql="SELECT * FROM `Teacher` WHERE id = $ID";
	$result = $con->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$fname=$row['fname'];
			$lname=$row['lname'];
			$phoneNo=$row['phoneNo'];
			$gender=$row['gender'];
			$subject=$row['subject'];
			$email=$row['email'];
			$class=$row['class'];
			$username=$row['username'];
		}
    }
    $_SESSION['username']=$username;
    $_SESSION['class']=$class;	
    $_SESSION['ID']=$ID;
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher Account</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="loginbox">
		<img src="p2.png" class="avatar">
		<h1>Welcome <strong><?php echo "$fname $lname" ?></strong></h1>
		<h4>Class Teacher of class <?php echo $class ?></h4>
		<br>
		<form action="#" method="POST">
			<input type="submit" name="change" value="Peek Marks" formaction="peekMarks.php">
			<input type="submit" name="Marks" value="Enter Marks" formaction="enterMarks.php">
			<input type="submit" name="change" value="Change password" formaction="change.php">
		</form>
	</div>
	<a href="login.php">
  		<img src="p3.png" alt="Logout" style="width:50px;height:42px;border:0;position: fixed;top: 8px;right: 16px;font-size: 18px;">
	</a>
</body>
</html>