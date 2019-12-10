<!DOCTYPE html>
<html>
<head>
	<title>Delete Teacher</title>
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
	<div class="loginbox" style="top: 400px; height: 570px; width: 400px;">
		<img src="p2.png" class="avatar">
		<form action="#" method="POST">
			<p>Enter the <strong>id</strong> of the Teacher you want to <strong style="color: pink">delete</strong>.</p>
			<input type="text" name="Tid" placeholder="0">
			<p>Re-enter the <strong>id</strong> of the Teacher you want to <strong style="color: pink">delete.</strong></p>
			<input type="text" name="RTid" placeholder="0">
			<br>
			<p>Type "yes" if you want to delete the Teacher details. <strong style="color: pink">NOTE: THIS ACTION CANNOT BE UNDONE.</strong></p>
			<input type="text" name="agree" placeholder="No">
			<br><br>
			<p>Enter password</p>
			<input type="password" name="pass">
			<br><br>
			<input type="submit" name="submit" value="DELETE">
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
	if(isset($_POST['Tid']) && isset($_POST['RTid']) && isset($_POST['agree']) && isset($_POST['pass']))
	{
		$Tid=$_POST['Tid'];
		$RTid=$_POST['RTid'];
		$agree=$_POST['agree'];
		$pass=$_POST['pass'];





		$sql = "select * from Hogwarts.login where uname='admin' AND pass='".$pass."' limit 1";

		$result=mysqli_query($con,$sql);

		if (mysqli_num_rows($result)==1)
		{
			if($Tid == $RTid)
			{
				if($agree=="Yes" || $agree =="yes")
				{



					$sql="SELECT `username` FROM `Teacher` WHERE id = '$Tid'";
					$result = $con->query($sql);
					if ($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							$Tid=$row['username'];
						}
					}



					$sql = "DELETE from Teacher WHERE id = '$Tid'";
					$result = mysqli_query($con,$sql);
					if($result)
					{
						?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Record deleted successfully";?></font></div><?php
					}
					else
					{
						?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Record not found";?></font></div><?php
					}


					//$sql = "call deleteProc($Tid)";
					//$result=mysqli_query($con,$sql);

					
				}
				else
				{
					?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Record not deleted";?></font></div><?php
				}
			}
			else
			{
				?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Teacher ids not matching";?></font></div><?php
			}
		}
		else
		{
			?> <div style= "width:50px;height:42px;border:0;position: fixed;top: 20%; left: 3%;font-size: 18px;">
		<font color="white"><?php echo "Password incorrect. Record not deleted.";?></font></div><?php
		}
		

	}
 ?>