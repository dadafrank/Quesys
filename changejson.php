<?php
	// 自动生产随机码
	function GetRandStr($length){
		$str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$len=strlen($str)-1;
		$randstr='';
		for($i=0;$i<$length;$i++){
		$num=mt_rand(0,$len);
		$randstr .= $str[$num];
		}
		return $randstr;
	}
	$total = $_POST['total'];
	$total = htmlspecialchars($total);
	$total = str_replace("'","\"",$total);
	$num = GetRandStr(10);
	$num = $num;
	$user = $_COOKIE['user'];
	$myfile = fopen("./fjson/$num.json","w") or die("Unable to open file!");
	fwrite($myfile, $total);
	fclose($myfile);
	$myfile2 = fopen("./ujson/$user.json","a")or die("Unable to open file!");
	fwrite($myfile2,$num);
	fwrite($myfile2,"\n");
	fclose($myfile2);
	echo $num;
?>