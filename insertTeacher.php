<!DOCTYPE html>
<html>
<head>
	<title>Insert Teacher details</title>
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
	<div class = "loginbox" style="margin-top: 25%; height: 1000px; ">
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
  			<p>Subject</p>
  			<input type="text" name="subject" placeholder="Defense against the Dark Arts(DADA)">
			<p>email</p>
			<input type="email" name="email" placeholder="abc@xyz.com">
			<p>Class</p>
			<input type="number" name="DepartmentAllotted" placeholder="7">
			<p>Username</p>
			<input type="text" name="username" placeholder="Hogwarts123">
			<p>Enter password</p>
			<input type="password" name="password1" placeholder="Enter Password">
			<p>Re-enter password</p>
			<input type="password" name="password2" placeholder="Enter Password">
			<input type="Submit" name="submit" value="Submit">
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


	if(isset($_POST['FName']) && isset($_POST['LName']) && isset($_POST['phoneNo']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2']))
	{
		//entering
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
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$deptAlloted=isset($_POST['DepartmentAllotted']) ? $_POST['DepartmentAllotted'] : 0;
		$username=$_POST['username'];
		$password1=$_POST['password1'];
		$password2=$_POST['password2'];
		
		$sql = "select * from Hogwarts.login where uname='".$username."'";
		$result=mysqli_query($con,$sql);

		if (mysqli_num_rows($result)==1)
		{
			echo "Username Already exists.";
		}
		else
		{

			if($password2==$password1)
			{
				$sql = "INSERT INTO `login`(`uname`, `pass`, `SchoolID`) VALUES ('$username','$password1',0)";
				$result = mysqli_query($con,$sql);	

				$sql = "INSERT INTO `Teacher`(`fname`, `lname`, `phoneNo`, `gender`, `subject`, `email`, `class`, `username`) VALUES ('$Fname','$Lname','$phoneNo','$gender','$subject','$email',$deptAlloted,'$username')";
				$result = mysqli_query($con,$sql);
				
				$sql="SELECT `id` FROM `Teacher` WHERE username = '$username'";
				$result = $con->query($sql);
				if ($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$Tid=$row['id'];
					}
				}
				$sql="UPDATE login SET SchoolID=$Tid where uname = '$username'";
				$result= mysqli_query($con,$sql);
				$sql2="UPDATE `Marks` SET `Tid`=$Tid WHERE class = $deptAlloted";
				$result1= mysqli_query($con,$sql2);
				if($result && $result1)
				{
					?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Record inserted successfully";?></font></div><?php
				}
			}
		}
	}
 ?>