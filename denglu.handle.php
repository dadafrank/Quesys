<?php
	require_once('connect.php');
	$user = htmlspecialchars($_POST[user]);
	$user = str_replace("'","\'",$user);
	$password = htmlspecialchars($_POST[password]);
	$password = str_replace("'","\'",$password);
	$sql = "select * from que_user where name = '$user' and psd = '$password'";
	$query = mysql_query($sql);
	$result = mysql_num_rows($query);
	if($result >= 1){
		setcookie("lalala","frank");
		setcookie("user","$user");
		echo "<script>window.location.href='uindex.php'</script>";
	}
	else {
		echo "<script>alert('账号或者密码错误');window.location.href='index.html'</script>";
	}
?>