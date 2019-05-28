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
	$total = str_replace("<","&lt;",$total);
	$total = str_replace(">","&gt;",$total);
	$total = str_replace("\"","&quot;",$total);
	$total = str_replace("**","\"",$total);
	$total = str_replace("\n","<br/>",$total);
	$title = $_POST['title'];
	$title = htmlspecialchars($title);
	$title = str_replace("'","\"",$title);
	$title = str_replace("\n","<br/>",$title);
	$num = GetRandStr(10);
	$num = $num;
	$user = $_COOKIE['user'];
	$myfile = fopen("./fjson/$num.json","w") or die("Unable to open file!");
	fwrite($myfile,"{");
	fwrite($myfile,"\n");
	fwrite($myfile,"\"number\":\"0000\"");
	fwrite($myfile,"\n");
	fwrite($myfile,",\"title\":\"$title\"");
	fwrite($myfile,"\n");
	fwrite($myfile, $total);
	fwrite($myfile,"\n");
	fwrite($myfile,",\"ans\":[");
	fwrite($myfile,"\n");
	fwrite($myfile,"]}");
	fclose($myfile);
	// 将标题和id归属到用户的json
	$myfile2 = fopen("./ujson/$user.json","a")or die("Unable to open file!");
	fwrite($myfile2,$num);
	fwrite($myfile2,"\n");
	fwrite($myfile2,$title);
	fwrite($myfile2,"\n");
	fclose($myfile2);
	echo $num;
?>