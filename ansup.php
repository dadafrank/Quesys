<?php
	// 设置格式
	$queid = $_POST[queid];
	// $queid = htmlspecialchars($queid);
	$queid = str_replace("<","&lt;",$queid);
	$queid = str_replace(">","&gt;",$queid);
	$queid = str_replace("\"","&quot;",$queid);
	
	$total = $_POST[total];
	// $total = htmlspecialchars($total);
	$total = str_replace("<","&lt;",$total);
	$total = str_replace(">","&gt;",$total);
	$total = str_replace("\"",",&quot;",$total);
	$total = str_replace("**","\"",$total);
	$total = str_replace("\n","<br/>",$total);
	$number = $_POST[number];
	$b = $_POST[b];
	// 判断是否有锁
	$file = fopen("./fjson/$queid.json","r+");
	fseek($file,12);
	fwrite($file,$number);
	fseek($file,0);
	if($b != 1) {
		$total = "," . $total;
	}
	for($i = 0;$i < 4 + $b;$i++) {
		echo fgets($file);
	}
	fwrite($file,$total);
	fwrite($file,"\n");
	fwrite($file,"]}");
	fclose($file);
?>