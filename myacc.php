<?php


$host="localhost";
$user="root";
$password="";
$db="Hogwarts";

mysql_connect($host,$user,$password);
mysql_select_db($db);

if(isset($_POST['username'])){
	$uname=$_POST['username'];
	$password=$_POST['password'];

	$sql = "select * from Hogwarts.login where uname='".$uname."' AND pass='".$password."' limit 1";

	$result=mysql_query($sql);

	if (mysql_num_rows($result)==1) {
		echo "You have successfully logged in";
		exit();
	}
	else{
		echo "Username or password not found";
		exit();
	}
}
	


?>