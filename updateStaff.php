<!DOCTYPE html>
<html>
<head>
	<title>update Staff Details</title>
	<link rel="stylesheet" type="text/css" href="insertd.css">
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
	<div class="loginbox" style="top: 500px; height: 800px;">
		<form action="#" method="POST">
			<img src="p2.png" class="avatar">
			<p>Enter the Staff ID</p>
			<input type="number" name="Tid" placeholder="9">
			<br><br>
			<p>Type the new fields</p><br><br>
			<br><br>
			<p>New First name</p>
			<input type="text" name="FName" placeholder="Enter First Name">
			<p>New Last name</p>
			<input type="text" name="LName" placeholder="Enter Last Name">
			<p>New Phone number</p>
			<input type="text" name="phoneNo" placeholder="9999999999">
			<p>New Department Alloted</p>
			<input type="text" name="deptAlloted" placeholder="abc@xyz.com">
			<p>New Salary</p>
			<input type="number" name="DepartmentAllotted" placeholder="7">
			<br><br>
			<p>Enter your password</p>
			<input type="password" name="pass">
			<br><br>
			<input type="submit" name="submit" value="UPDATE">
		</form>
	</div>
	<div class = "logout">
	<a href="login.php">
  		<img src="p3.png" alt="Logout" style="width:50px;height:42px;border:0;position: fixed;top: 8px;right: 16px;font-size: 18px;">
	</a>
</div>
</body>
</html>



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

	

	//$result = mysqli_query($con,$sql);
	//	if($result)
		//{
		//	echo "new record is inserted successfully";
		//}


	if(isset($_POST['FName']) && isset($_POST['LName']) && isset($_POST['phoneNo']) && isset($_POST['deptAlloted']) && $_POST['Tid'] && isset($_POST['DepartmentAllotted']) && isset($_POST['pass']))
	{
		//entering
		$Fname=$_POST['FName'];
		$Lname=$_POST['LName'];
		$phoneNo=$_POST['phoneNo'];
		$deptAlloted=$_POST['deptAlloted'];
		$salary=$_POST['DepartmentAllotted'];
		$Tid=$_POST['Tid'];
		$pass=$_POST['pass'];
		

		$sql = "select * from Hogwarts.login where uname='admin' AND pass='".$pass."' limit 1";

		$result=mysqli_query($con,$sql);

		if (mysqli_num_rows($result)==1)
		{
			$sql = "UPDATE `Staff` SET `fname`='$Fname',`lname`='$Lname',`phoneNo`='$phoneNo',`deptAlloted`='$deptAlloted',`salary`=$salary WHERE id = $Tid;";
			$result = mysqli_query($con,$sql);	
			if($result)
			{
				?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Record updated successfully";?></font></div><?php
			}
			else
			{
				?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Record not updated";?></font></div><?php
			}
		}
		else
		{
			?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Password Incorrect";?></font></div><?php
		}

	}
 ?>