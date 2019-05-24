<?php
	if($_COOKIE["lalala"]!="frank") {
		echo "<script>alert('请返回登录');window.location.href='index.html'</script>";
	}
	else {
		$queid = $_GET[queid];
		$num = $_GET[num];
		$user = $_COOKIE[user];
		$data = [];
		$ndata = [];
		$file = "./fjson/" . $queid . ".json";
		$ffile = "./ujson/" . $user . ".json";
		if (!unlink($file))
		  {
			echo ("Error deleting $file");
		  }
		else
		  {
			// 先把没有删除的找出来放在另一个数组,然后再创建新的文件
			$frank = fopen("./ujson/$user.json","r") or die ("Unable to open file!");
			while(!feof($frank)) {
				array_push($data,fgets($frank));
			}
			fclose($frank);
			array_pop($data);
			for($i = 0;$i < count($data);$i++) {
				if($i != $num && $i != $num + 1) {
					array_push($ndata,$data[$i]);
				}
			}
			if(!unlink($ffile)) {
				echo ("删除出错");
			}
			else {
				$nfile = fopen("./ujson/$user.json","w") or die ("Unable to open file!");
				for($j = 0;$j < count($ndata);$j++) {
					fwrite($nfile,$ndata[$j]);
				}
				fclose($nfile);
				echo "<script>alert('删除成功');window.location.href='./uindex.php'</script>";
			}
		  }
	}
?>