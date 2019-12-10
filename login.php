<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="login.css">
<body>
<div class="loginbox">
	<img src="p2.png" class="avatar">
	<h1>Login Here</h1>
	<form action="#" method="POST">
		<label>Select account type  </label>
        <select name="accountType">
        	<option value = "Teacher" selected="selected">Teacher</option>
            <option value = "Student">Student</option>
            <option value = "Staff">Staff</option>
            <option value = "Admin">Admin</option>
        </select>
        <br><br>
		<p>Username</p>
		<input type="text" name="username" placeholder="Enter Username">
		<p>Password</p>
		<input type="password" name="password" placeholder="Enter Password">
		<br><br>
		<input type="submit" name="submit" value="Login">
	</form>

</div>
</body>
</head>
</html>



<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="Hogwarts";

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,$db);

if(isset($_POST['username']) && isset($_POST['submit'])  && isset($_POST['accountType']))
{

	$accType=$_POST['accountType'];
	$uname=$_POST['username'];
	$password=$_POST['password'];

	$sql = "select * from Hogwarts.login where uname='".$uname."' AND pass='".$password."' limit 1";

	$result=mysqli_query($con,$sql);

	if (mysqli_num_rows($result)==1) {
		//echo "You have successfully logged in";

		if($accType=='Admin')
		{
			header("Location: process.php");
			exit();	
		}
		elseif ($accType=='Teacher')
		{
			$sql="SELECT `SchoolID` FROM `login` WHERE uname = '$uname'";
			$result = $con->query($sql);

			if ($result->num_rows > 0)
			{
       			while($row = $result->fetch_assoc())
    			{
        			$_SESSION['ID'] = $row['SchoolID'];
        			header("Location: teacherAccount.php");
    			}
			}
		}
		elseif ($accType=='Student')
		{
			$sql="SELECT `SchoolID` FROM `login` WHERE uname = '$uname'";
			$result = $con->query($sql);

			if ($result->num_rows > 0)
			{
       			while($row = $result->fetch_assoc())
    			{
        			$_SESSION['ID'] = $row['SchoolID'];
        			header("Location: studentAccount.php");
    			}
			}
		}
		elseif($accType=='Staff')
		{
			$sql="SELECT `SchoolID` FROM `login` WHERE uname = '$uname'";
			$result = $con->query($sql);

			if ($result->num_rows > 0)
			{
       			while($row = $result->fetch_assoc())
    			{
        			$_SESSION['ID'] = $row['SchoolID'];
        			header("Location: staffAccount.php");
    			}
			}
		}
	}
	else{
		?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Username or password not found";
		exit();?></font></div><?php
	}
}
	
	//"width:50px;height:42px;border:0;position: fixed;top: 50%; left: %;font-size: 18px;"


?>