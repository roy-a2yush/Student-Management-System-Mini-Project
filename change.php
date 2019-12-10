<?php 

	session_start();
	$host="localhost";
	$user="root";
	$password="";
	$db="Hogwarts";

	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,$db);

	$ID=$_SESSION['ID'];
	$username = $_SESSION['username'];
	$_SESSION['ID'] = $ID;
	$sql="SELECT `pass` FROM `login` WHERE uname = '$username'";
	$result = $con->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$pass=$row['pass'];
		}
    }
    
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>change Password</title>
 	<link rel="stylesheet" type="text/css" href="login.css">
 </head>
 <body>
 	<div class="Menu">
		<ul>
	 		<li><a class="active" href="teacherAccount.php">Home</a></li>
		</ul>
	</div>
 	<div class="loginbox" style="height: 530px; top: 380px;">
		<img src="p2.png" class="avatar">
		<h4>Change Password</h4>
		<br>
		<form action="#" method="POST">
			<p>Enter current password</p>
			<input type="password" name="oldPass">
			<p>Enter new password</p>
			<input type="password" name="pass1">
			<p>Re-enter new password</p>
			<input type="password" name="pass2">
			<input type="submit" name="change" value="Confirm Change">
		</form>
	</div>
	<a href="login.php">
  		<img src="p3.png" alt="Logout" style="width:50px;height:42px;border:0;position: fixed;top: 8px;right: 16px;font-size: 18px;">
	</a>
 </body>
 </html>


 <?php 

 	if(isset($_POST['oldPass']) && isset($_POST['pass2']) && isset($_POST['pass1']))
 	{
 		$oldPass = $_POST['oldPass'];
 		$pass1 = $_POST['pass1'];
 		$pass2 = $_POST['pass2'];


 		if($pass==$oldPass)
 		{

		 	if($pass2==$pass1)
			{	
				$sql2="UPDATE `login` SET `pass`='$pass1' WHERE uname = '$username'";
				$result1= mysqli_query($con,$sql2);
				if($result1)
				{
					?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "UPDATED";?></font></div><?php
				}
				else
				{
					?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "NOT UPDATED";?></font></div><?php
				}
			}
			else
			{
				?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Passwords not matching";?></font></div><?php
			}
		}
		else
		{
			?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Incorrect Password";?></font></div><?php
		}
	}



  ?>