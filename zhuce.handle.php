<?php
	require_once('connect.php');
	$user = htmlspecialchars($_POST[user]);
	$user = str_replace("'","\'",$user);
	$user = str_replace(" ","",$user);
	$email = htmlspecialchars($_POST[email]);
	$email = str_replace("'","\'",$email);
	$email = str_replace(" ","",$email);
	$password = htmlspecialchars($_POST[password]);
	$password = str_replace("'","\'",$password);
	$password = str_replace(" ","",$password);
	if ($user==""||$email==""||$password=="") {
		echo "<script>alert('不能只有空格啊，而且空格会自动被省略，别皮！');window.location.href='index.html'</script>";
	}
	else {
		// 查询是否有重复的用户名或者邮箱
		$sql1 = "select * from que_user where name = '$user'";
		$sql2 = "select * from que_user where email = '$email'";
		$query1 = mysql_query($sql1);
		$result1 = mysql_num_rows($query1);
		$query2 = mysql_query($sql2);
		$result2 = mysql_num_rows($query2);
		if ($result1 >= 1) {
			echo "<script>alert('用户名已经被占用');window.location.href='index.html'</script>";
		}
		else if ($result2 >= 1) {
			echo "<script>alert('邮箱已经被注册了');window.location.href='index.html'</script>";
		}
		else {
			$sql3 = "insert que_user(name,email,psd) values('$user','$email','$password')";
			$query3 = mysql_query($sql3);
			$result3 = mysql_num_rows($query3);
			if($result3 >= 1) {
				echo "<script>alert('注册成功，请返回登录');window.location.href='index.html'</script>";
			}
		}
	}
?>