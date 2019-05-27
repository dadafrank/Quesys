<?php
	header("Content-Type: text/html;charset=utf-8");
	if($_COOKIE["lalala"]!="frank") {
		echo "<script>alert('请返回登录');window.location.href='index.html'</script>";
	}
	else {
		$data = [];
		$user = $_COOKIE['user'];
		$file = fopen("./ujson/$user.json","r") or die ("Unable to open file!");
		while(!feof($file)) {
			array_push($data,fgets($file));
		}
		fclose($file);
		array_pop($data);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>查看问卷</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/chakan.css"/>
	</head>
	<body>
		<div id="banner" class="banner">frank</div>
		<ul class="wenjuan">
			<?php
				if(empty($data)){
					echo "当前没有问卷";
				}
				else{
					for($i = 0;$i<count($data);$i+=2) {
			?>
			<li>
				<a target="_blank" href="./ans.html?queid=<?php echo $data[$i]?>"><span class="title"><?php echo $data[$i+1] ?></span></a>
				<a>
					<span class="delete" onclick="istrue()">删除</span>
					<input type="hidden" value="<?php echo $data[$i]?>" />
					<input type="hidden" value="<?php echo $i?>" />
				</a>
				<a href="./data.html?queid=<?php echo $data[$i] ?>&user=<?php echo $_COOKIE[user]?>"><span class="delete">情况</span></a>
			</li>
			<?php
					}
				}
			?>
		</ul>
		<p class="tishi">提示：点击标题进入问卷</p>
		
		<script>
			function istrue(e) {
				if(confirm("确定删除吗？")) {
					e = e || window.event;
					window.location.href = "./delete.php?queid=" + e.target.parentNode.children[1].value + "&num=" + e.target.parentNode.children[2].value;
				}
			}
		</script>
	</body>
</html>
