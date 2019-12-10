<?php 

	session_start();
	$ID = $_SESSION['ID'];
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login details</title>
 	<link rel="stylesheet" type="text/css" href="login.css">
 </head>
 <body>
 
 	<div class="loginbox">
		<img src="p2.png" class="avatar">
		<h1>Enter login details</h1>
		<form action="#" method="POST">
			<p>Re-enter username</p>
			<input type="text" name="username" placeholder="Enter Username">
			<p>Enter Password</p>
			<input type="password" name="password1" placeholder="Enter Password">
			<p>Re-Enter Password</p>
			<input type="password" name="password2" placeholder="Enter Password">
			<br><br>
			<input type="submit" name="submit" value="Login">
		</form>
	</div>

 </body>
 </html>


 <?php 

 	$host="localhost";
	$user="root";
	$password="";
	$db="Hogwarts";

	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,$db);

	
	if(isset($_POST['username']) && isset($_POST['submit'])  && isset($_POST['password2'])  && isset($_POST['password1']))
	{
		if($_POST['username']==$_SESSION['uname'] && $_POST['password2']==$_POST['password1'])
		{
			$username=$_POST['username'];
			$pass=$_POST['password1'];
			$sql="INSERT INTO `login`(`uname`, `pass`, `SchoolID`) VALUES ('$username','$pass',$ID)";
			$result = mysqli_query($con,$sql);
			if($result)
			{
				echo "new record is inserted successfully";
				header("Location: process.php");
			}
			else
			{
				echo "record not inserted";
			}
		}
	}
  ?>