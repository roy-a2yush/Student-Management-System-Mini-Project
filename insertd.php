<!DOCTYPE html>
<html>
<head>
	<title>Insert Teacher details</title>
	<link rel="stylesheet" type="text/css" href="insertd.css">
</head>
<body>
	<div class = "loginbox" style="margin-top: 20%">
		<img src="p2.png" class="avatar">
		<h1>Teacher Registration</h1>
		<form action="#" method="POST">
			<p>First name</p>
			<input type="text" name="FName" placeholder="Enter First Name">
			<p>Last name</p>
			<input type="text" name="LName" placeholder="Enter Last Name">
			<p>Phone number</p>
			<input type="text" name="phoneNo" placeholder="9999999999">
			<p>Gender</p><br>
  			<input type="radio" name="gender" value="male" id="gender" > <font size="2">Male</font><br>
  			<input type="radio" name="gender" value="female" id="gender" > <font size="2">Female</font><br>
  			<input type="radio" name="gender" value="other" id="gender" > <font size="2">Other</font>
  			<br>
  			<br>
			<p>Main Subject</p>
			<input type="text" name="Mainsub" placeholder="Sanskrit">
			<p>Qualification</p>
			<input type="text" name="Qualification" placeholder="BeD">
			<p>Address</p>
			<input type="text" name="address" placeholder="Bangalore 560037">
			<p>email</p>
			<input type="email" name="email" placeholder="abc@xyz.com">
			<p>Class alloted</p>
			<input type="text" name="classAllotted" placeholder="9">
			<p>enter Username</p>
			<input type="text" name="username" placeholder="Hogwarts123">
			<input type="Submit" name="submit" value="Submit">
		</form>
	</div>
</body>
</html>

<?php 

	session_start();

	$host = "localhost";
	$user="root";
	$password="";
	$db="Hogwarts";

	$con=mysqli_connect("localhost","root","","Hogwarts");
	if($con === false)
	{
		echo "hello";
	}

	mysqli_select_db($con,$db);

	
	//$result = mysqli_query($con,$sql);
	//	if($result)
		//{
		//	echo "new record is inserted successfully";
		//}

	if(isset($_POST['FName']) && isset($_POST['LName']) && isset($_POST['phoneNo']) && isset($_POST['gender']) && isset($_POST['Mainsub']) && isset($_POST['Qualification']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['username']))
	{
		echo "HELOOOOOOOOOOOOO";
		$Fname=$_POST['FName'];
		$Lname=$_POST['LName'];
		$phoneNo=$_POST['phoneNo'];
		if($_POST['gender']=="female"){
			$gender="f";
		}
		elseif ($_POST['gender']=="male") {
			$gender="m";
		}
		else{
			$gender="o";
		}
		$Mainsub=$_POST['Mainsub'];
		$Qualification=$_POST['Qualification'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$subAlloted=isset($_POST['classAlloted']) ? $_POST['classAlloted'] : "0";
		$username=$_POST['username'];
	
		$sql = "INSERT INTO `Teacher`(`Tfname`, `Tlname`, `Tpno`, `Tgender`, `Tmsub`, `Tquali`, `Taddress`, `Temail`, `Tclass`, `uname`) VALUES ('$Fname','$Lname','$phoneNo','$gender','$Mainsub','$Qualification','$address','$email','$subAlloted','$username')";
		$result = mysqli_query($con,$sql);
		if($result)
		{
			?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Record inserted successfully";?></font></div><?php

			/*$sql="SELECT `TiD` FROM `Teacher` WHERE uname = '$username'";
			$result = $con->query($sql);

			if ($result->num_rows > 0)
			{
       			while($row = $result->fetch_assoc())
    			{
        			$_SESSION['ID'] = $row['TiD'];
    			}
			}
			$_SESSION['uname']=$username;
			header("Location: loginDetails.php");*/
		}

	}
 ?>