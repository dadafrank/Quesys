<?php
	if($_COOKIE["lalala"]!="frank") {
		echo "<script>alert('请返回登录');window.location.href='index.html'</script>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>创建问卷</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/found.css"/>
		<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	</head>
	<body>
		<!-- 单选、多选、文本、下拉 -->
		<div class="board" id="board">
			<div class="boardhid" onclick="hidboard()">X</div>
			<ul>
				<li onclick="showq(1)">单选</li>
				<li onclick="showq(2)">多选</li>
				<li onclick="showq(3)">文本</li>
				<li onclick="showq(4)">下拉</li>
			</ul>
		</div>
		<!-- 单选、单选、单选 -->
		<div class="danxuan" id="danxuan">
			<div class="danxuan_div container">
				<p class="xxx" onclick="hidq(1)">X</p>
				<p>问题</p>
				<textarea placeholder="请输入问题" id="danxuan_q"></textarea>
				<ul class="danxuan_ul" id="danxuan_ul">
					<li>
						<p>选项1</p>
						<textarea class="danxuan_textarea"></textarea>
					</li>
					<li>
						<p>选项2</p>
						<textarea class="danxuan_textarea"></textarea>
					</li>
				</ul>
				<div class="danxuan_add_li" onclick="danxuan_add()">+</div>
				<div class="danxuan_delete_li" onclick="danxuan_delete()">-</div>
				<div class="danxuan_wancheng" onclick="danxuan_wancheng()">完成</div>
			</div>
		</div>
		<!-- 多选、多选、多选 -->
		<div class="duoxuan" id="duoxuan">
			<div class="duoxuan_div container">
				<p class="xxx" onclick="hidq(2)">X</p>
				<p>问题</p>
				<textarea placeholder="请输入问题" id="duoxuan_q"></textarea>
				<ul class="duoxuan_ul" id="duoxuan_ul">
					<li>
						<p>选项1</p>
						<textarea class="duoxuan_textarea"></textarea>
					</li>
					<li>
						<p>选项2</p>
						<textarea class="duoxuan_textarea"></textarea>
					</li>
				</ul>
				<div class="duoxuan_add_li" onclick="duoxuan_add()">+</div>
				<div class="duoxuan_delete_li" onclick="duoxuan_delete()">-</div>
				<div class="duoxuan_wancheng" onclick="duoxuan_wancheng()">完成</div>
			</div>
		</div>
		<!-- 文本、文本、文本 -->
		<div class="wenben" id="wenben">
			<div class="wenben_div container">
				<p class="xxx" onclick="hidq(3)">X</p>
				<p>问题</p>
				<textarea placeholder="请输入问题" id="wenben_q"></textarea>
				<div class="wenben_wancheng" onclick="wenben_wancheng()">完成</div>
			</div>
		</div>
		<!-- 下拉、下拉、下拉 -->
		<div class="xiala" id="xiala">
			<div class="xiala_div container">
				<p class="xxx" onclick="hidq(4)">X</p>
			</div>
		</div>
		<!-- 这里是创建的主页 -->
		<!-- 这里是创建的主页 -->
		<!-- 这里是创建的主页 -->
		<div class="banner">创建问卷</div>
		<div class="biaoti_class">
			<textarea class="biaoti" placeholder="请输入标题"></textarea>
		</div>
		<div class="found">
			<ol class="index_ol" id="index_ol">
			</ol>
		</div>
		<div class="add" onclick="showboard()">新的问题</div>
		<div class="finish" onclick="wenjuan_wancheng()">完成</div>
		
		
		<script>
			// 单选计数
			var danxuan_num = 2;
			// 多选技术
			var duoxuan_num = 2;
			// 总问题数
			var q_num = 0;
			// 选择的显示和隐藏
			// 选择的显示和隐藏
			// 选择的显示和隐藏
			function showboard() {
				var board = document.getElementById("board")
				board.style.display = 'block';
			}
			function hidboard() {
				var board = document.getElementById("board")
				board.style.display = 'none';
			}
			// 4个的显示和隐藏
			// 4个的显示和隐藏
			// 4个的显示和隐藏
			function showq(num) {
				hidboard();
				switch(num) {
					case 1: var danxuan = document.getElementById("danxuan");
							danxuan.style.display = "block";
							break;
					case 2: var duoxuan = document.getElementById("duoxuan");
							duoxuan.style.display = "block";
							break;
					case 3: var wenben = document.getElementById("wenben");
							wenben.style.display = "block";
							break;
					default: var xiala = document.getElementById("xiala");
							xiala.style.display = "block";
							break;
				}
			}
			function hidq(num) {
				switch(num) {
					case 1: var danxuan = document.getElementById("danxuan");
							danxuan.style.display = "none";
							break;
					case 2: var duoxuan = document.getElementById("duoxuan");
							duoxuan.style.display = "none";
							break;
					case 3: var wenben = document.getElementById("wenben");
							wenben.style.display = "none";
							break;
					default: var xiala = document.getElementById("xiala");
							xiala.style.display = "none";
							break;
				}
			}
			function q_delete(e) {
				e = e || window.event;
				var index_ol = document.getElementById("index_ol")
				index_ol.removeChild(e.target.parentNode)
				q_num--;
			}
			// 单选添加
			function danxuan_add() {
				if (danxuan_num < 10) {
					danxuan_num++;
					var danxuan_ul = document.getElementById("danxuan_ul");
					var danxuan_li = document.createElement("LI");
					danxuan_li.innerHTML = "<p>选项"+ danxuan_num +"</p><textarea class='danxuan_textarea'></textarea>"
					danxuan_ul.appendChild(danxuan_li);
				}
				else {
					alert("最多只能10个选项")
				}
			}
			// 单选删除
			function danxuan_delete() {
				if(danxuan_num > 2) {
					var danxuan_ul = document.getElementById("danxuan_ul");
					danxuan_ul.removeChild(danxuan_ul.lastChild);
					danxuan_num--;
				}
				else {
					alert("至少要有两项")
				}
			}
			// 单选完成
			function danxuan_wancheng() {
				var q = document.getElementById("danxuan_q")
				var a = document.getElementsByClassName("danxuan_textarea")
				if(q.value=='') {
					alert("请填写问题")
				}
				else if (a[0].value == ''|| a[1].value == '') {
					alert("请填写选项")
				}
				else {
					// 总问题数+1
					q_num++;
					var aa = "";
					for(var i = 0;i < a.length;i++) {
						var j = "<label><input type='radio' name='danxuan"+ q_num +"'>"+ a[i].value +"</label>"
						aa = aa + j
						// 清空
						a[i].value = ''
					}
					var danxuan_ol = document.getElementById("index_ol");
					var danxuan_li = document.createElement("LI");
					danxuan_li.innerHTML = "<p>" + q.value + "</p><div class='index_ol_input danxuan_xx'>"+ aa +"</div><div class='index_ol_delete' onclick='q_delete()'>删除</div><input type='hidden' value='1'/>";
					danxuan_ol.appendChild(danxuan_li);
					hidq(1);
					// 清空
					q.value = ''
					for(var i= danxuan_num;i>2;i--) {
						danxuan_delete();
					}
				}
			}
			// 多选添加
			function duoxuan_add() {
				if (duoxuan_num < 10) {
					duoxuan_num++;
					var duoxuan_ul = document.getElementById("duoxuan_ul");
					var duoxuan_li = document.createElement("LI");
					duoxuan_li.innerHTML = "<p>选项"+ duoxuan_num +"</p><textarea class='duoxuan_textarea'></textarea>"
					duoxuan_ul.appendChild(duoxuan_li);
				}
				else {
					alert("最多只能10个选项")
				}
			}
			// 多选删除
			function duoxuan_delete() {
				if(duoxuan_num > 2) {
					var duoxuan_ul = document.getElementById("duoxuan_ul");
					duoxuan_ul.removeChild(duoxuan_ul.lastChild);
					duoxuan_num--;
				}
				else {
					alert("至少要有两项")
				}
			}
			// 多选完成
			function duoxuan_wancheng() {
				var q = document.getElementById("duoxuan_q")
				var a = document.getElementsByClassName("duoxuan_textarea")
				if(q.value=='') {
					alert("请填写问题")
				}
				else if (a[0].value == ''|| a[1].value == '') {
					alert("请填写选项")
				}
				else {
					// 总问题数+1
					q_num++;
					var aa = "";
					for(var i = 0;i < a.length;i++) {
						var j = "<label><input type='checkbox' name='duoxuan"+ q_num +"'>"+ a[i].value +"</label>"
						aa = aa + j
						// 清空
						a[i].value = ''
					}
					var duoxuan_ol = document.getElementById("index_ol");
					var duoxuan_li = document.createElement("LI");
					duoxuan_li.innerHTML = "<p>" + q.value + "</p><div class='index_ol_input duoxuan_xx'>"+ aa +"</div><div class='index_ol_delete' onclick='q_delete()'>删除</div><input type='hidden' value='2'/>";
					duoxuan_ol.appendChild(duoxuan_li);
					hidq(2);
					// 清空
					q.value = ''
					for(var i= duoxuan_num;i>2;i--) {
						duoxuan_delete();
					}
				}
			}
			// 文本完成
			function wenben_wancheng() {
				var q = document.getElementById("wenben_q")
				if(q.value=='') {
					alert("请填写问题")
				}
				else {
					q_num++;
					var wenben_ol = document.getElementById("index_ol");
					var wenben_li = document.createElement("LI");
					wenben_li.innerHTML = "<p>" + q.value + "</p><div class='index_ol_input wenben_xx'><textarea class='wenben_textarea'></textarea></div><div class='index_ol_delete' onclick='q_delete()'>删除</div><input type='hidden' value='3'/>";
					wenben_ol.appendChild(wenben_li);
					hidq(3);
					// 清空
					q.value = ''
				}
			}
			// 完成问卷调查
			function wenjuan_wancheng() {
				var index_ol = document.getElementById("index_ol")
				if(!index_ol.children.length) {
					alert("请至少填写一个问题")
				}
				else {
					// 传这个给后端
					var total = "{'data':{}}";
					// 存放aa的总格
					var jj = '';
					var aa = "111";
					for(var i = 0;i<index_ol.children.length;i++) {
						var k = '';
						// 如果是单选格式
						if(index_ol.children[i].lastChild.value == 1) {
							var k = "";
							for(var j = 0;j < index_ol.children[i].children[1].children.length;j++) {
								if( j == index_ol.children[i].children[1].children.length-1) {
									k = k + "'"+ index_ol.children[i].children[1].children[j].innerText +"'";
								}
								else {
									k = k + "'"+ index_ol.children[i].children[1].children[j].innerText +"',";
								}
							}
							aa = "'id':'"+ i +"','type':'"+ 1 +"','que':'"+ index_ol.children[i].children[0].innerHTML +"','ans':["+k+"]";
						}
						// 如果是多选格式
						else if(index_ol.children[i].lastChild.value == 2) {
							var k = "";
							for(var j = 0;j < index_ol.children[i].children[1].children.length;j++) {
								if( j == index_ol.children[i].children[1].children.length-1) {
									k = k + "'"+ index_ol.children[i].children[1].children[j].innerText +"'";
								}
								else {
									k = k + "'"+ index_ol.children[i].children[1].children[j].innerText +"',";
								}
							}
							aa = "'id':'"+ i +"','type':'"+ 2 +"','que':'"+ index_ol.children[i].children[0].innerHTML +"','ans':["+k+"]";
						}
						// 如果是文本格式
						else {
							aa = "'id':'"+ i +"','type':'"+ 3 +"','que':'"+ index_ol.children[i].children[0].innerHTML +"'";
						}
						if (i ==index_ol.children.length -1) {
							jj = jj + "{"+ aa +"}";
						}
						else {
							jj = jj + "{"+ aa +"},";
						}
					}
					total = "{'data':["+ jj +"]}";
					ajaxfound(total)
				}
			}
			function ajaxfound(total)
			{
				$.ajax(
				{
					url: "./changejson.php",
					type: "POST",
					datatype: "text",
					data: { total },
					success: function (num) {
						alert("创建完成");
						window.location.href = "wenjuanma.html?num=" + num;
					},
					error: function () {
						alert("创建失败")
					}
				})
			}
		</script>
	</body>
</html>
