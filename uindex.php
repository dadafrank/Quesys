<?php
	if($_COOKIE["lalala"]!="frank") {
		echo "<script>alert('请返回登录');window.location.href='index.html'</script>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>用户管理界面</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/uindex.css"/>
	</head>
	<body>
		<!-- 创建问卷、查看问卷简略页、查看问卷详情页（数据处理） -->
		<div class="banner">Frank</div>
		<ul class="user_ul">
			<li><a href="#">返回主页</a></li>
			<li><a href="#">创建问卷</a></li>
			<li><a href="#">查看问卷</a></li>
			<li class="flex_white"></li>
			<li class="flex_white"></li>
			<li class="flex_white"></li>
			<li class="flex_white"></li>
			<li class="flex_white"></li>
			<li class="flex_white"></li>
		</ul>
	</body>
</html>
