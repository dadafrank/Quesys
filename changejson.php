<?php
	$total = $_POST['total'];
	$total = str_replace("'","\"",$total);
	$myfile = fopen("./fjson/test.json","w") or die("Unable to open file!");
	fwrite($myfile, $total);
	fclose($myfile);
	echo "完成";
?>