<?php
	$queid = $_POST[queid];
	$total = $_POST[total];
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