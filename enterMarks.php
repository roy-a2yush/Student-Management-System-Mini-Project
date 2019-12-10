
<?php 

	session_start();
	$ID = $_SESSION['ID'];
	$_SESSION['ID']=$ID;
	$class = $_SESSION['class'];
	$username = $_SESSION['username'];

	$host="localhost";
	$user="root";
	$password="";
	$db="Hogwarts";

	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,$db);


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Enter marks</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="Menu">
		<ul>
	 		<li><a class="active" href="teacherAccount.php">Home</a></li>
		</ul>
	</div>
	<div class="loginbox" style="width: 500px; height: 770px; top: 520px;">
		<img src="p2.png" class="avatar">
		<p style="padding-left: 210px; font-weight: bold; font-size: 7;"><h1>Enter marks</h1></p>
		<form action="#" method="POST">
			<p>Enter Sid</p>
			<input type="number" name="Sid" placeholder="0">
			<p>Enter History Marks</p>
			<input type="number" name="History" placeholder="88">
			<p>Enter Transfiguration Marks</p>
			<input type="number" name="Transfiguration" placeholder="88">
			<p>Enter Defense Against the Dark Arts Marks</p>
			<input type="number" name="DADA" placeholder="88">
			<p>Enter Potions Marks</p>
			<input type="number" name="Potions" placeholder="88">
			<br><br>
			<p>Confirm your password</p>
			<input type="password" name="pass">
			<input type="submit" name="submitAnother" value="SUBMIT Another">
			<input type="submit" name="submit" value="SUBMIT & Peek">
		</form>
	</div>
	<a href="login.php">
  		<img src="p3.png" alt="Logout" style="width:50px;height:42px;border:0;position: fixed;top: 8px;right: 16px;font-size: 18px;">
	</a>
</body>
</html>

<?php
if(isset($_POST['Sid']) && isset($_POST['History']) && isset($_POST['Transfiguration']) && isset($_POST['Potions']) && isset($_POST['DADA']) && isset($_POST['pass']))
	{
		//entering
		$Sid=$_POST['Sid'];
		$History=$_POST['History'];
		$Transfiguration=$_POST['Transfiguration'];
		$Potions=$_POST['Potions'];
		$DADA=$_POST['DADA'];
		$pass=$_POST['pass'];
		
		$sql = "select * from Hogwarts.login where uname='$username' AND pass='".$pass."' limit 1";

		$result=mysqli_query($con,$sql);

		if (mysqli_num_rows($result)==1)
		{
			$sql = "UPDATE `Marks` SET `History`=$History,`Transfiguration`=$Transfiguration,`DADA`=$DADA,`Potions`=$Potions WHERE Sid = $Sid and Tid = $ID";
			$result = mysqli_query($con,$sql);	
			$sql1 = "UPDATE Marks SET Percentage = ((History+Transfiguration+DADA+Potions)/4)";
			$result2 = mysqli_query($con,$sql1);
			if($result)
			{
				echo "Record updated successfully";
				if(isset($_POST['submit']))
				{
					header("Location: peekMarks.php");
				}
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
		<font color="white"><?php echo "Password incorrect";?></font></div><?php
		}

	}
?>