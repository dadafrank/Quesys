<?php
	$queid = $_POST[queid];
	$queid = htmlspecialchars($queid);
	$queid = str_replace("&quot;","\"",$queid);
	$total = $_POST[total];
	$total = htmlspecialchars($total);
	$total = str_replace("&quot;","\"",$total);
	$total = str_replace("\n","<br/>",$total);
	$number = $_POST[number];
	$b = $_POST[b];
	$file = fopen("./fjson/$queid.json","r+");
	fseek($file,12);
	fwrite($file,$number);
	fseek($file,0);
	for($i = 0;$i < $b + 3;$i++) {
		fgets($file);
	}
	fwrite($file,$total);
	fwrite($file,"\n");
	fwrite($file,"}");
	fclose($file);
?>