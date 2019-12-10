<!DOCTYPE html>
<html>
<head>
	<title>Insert</title>
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
	<div class="loginbox">
		<img src="p2.png" class="avatar">
		<form method="POST" action="#">
			<h1>Insert Account type</h1>
			<input type="submit" name="teacher" value="TEACHER" formaction="insertTeacher.php" />
	   		<input type="submit" name="staff" value="STAFF" formaction="insertst.php" />
			<input type="submit" name="student" value="STUDENT" formaction="insertstu.php" />
		</form>
	</div>
	<div class = "logout">
	<a href="login.php">
  		<img src="p3.png" alt="Logout" style="width:50px;height:42px;border:0;position: fixed;top: 8px;right: 16px;font-size: 18px;">
	</a>
</div>

</body>
</html>