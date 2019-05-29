<?php
	// 设置格式
	$queid = $_POST[queid];
	// $queid = htmlspecialchars($queid);
	$queid = str_replace("<","&lt;",$queid);
	$queid = str_replace(">","&gt;",$queid);
	$queid = str_replace("\"","&quot;",$queid);
	$b = $_POST[b];
	$number = "";
	// 获取数据
	$fileget = file_get_contents("./fjson/$queid.json") or die("what?");
	$datas = json_decode($fileget,true);
	$bbb = (int)$datas["number"];
	// 判断两个b是否一样,不一样就让他们想等,只能减少出错率,不能百分比避免.
	if($b != $bbb) {
		$b = $bbb;
		$b++;
		// 为了保持json数据一致
		if($b < 10) {
			$number = "000" . $b;
		}
		else if($b < 100){
			$number = "00" . $b;
		}
		else if($b < 1000){
			$number = "0" . $b;
		}
		else {
			$number = $b;
		}
	}
	// 优先修改number,防止错乱
	$file = fopen("./fjson/$queid.json","r+");
	fseek($file,12);
	fwrite($file,$number);
	fseek($file,0);
	// 继续修改内容
	$total = $_POST[total];
	// $total = htmlspecialchars($total);
	$total = str_replace("<","&lt;",$total);
	$total = str_replace(">","&gt;",$total);
	$total = str_replace("\"",",&quot;",$total);
	$total = str_replace("**","\"",$total);
	$total = str_replace("\n","<br/>",$total);
	
	
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