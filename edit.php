<!DOCTYPE html>
<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="loginbox">
		<img src="p2.png" class="avatar">
		<form method="POST" action="#">
			<h1>Insert Account type</h1>
			<input type="submit" name="teacher" value="TEACHER" formaction="insertd.php" />
	   		<input type="submit" name="staff" value="STAFF" formaction="aStaff.php" />
			<input type="submit" name="student" value="STUDENT" formaction="aStudent.php" />
		</form>
	</div>
	<div class = "logout">
	<a href="login.php">
  		<img src="p3.png" alt="Logout" style="width:50px;height:42px;border:0;position: fixed;top: 8px;right: 16px;font-size: 18px;">
	</a>
</div>

</body>
</html>