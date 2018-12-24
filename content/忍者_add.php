<?php
	include("../function/condb.php");
?>

<html>
   <head>
		<meta charset = "utf-8">
		<title></title>
		<style type = "text/css">
			body {
				margin: 0px;
			}
			a {
				text-decoration: none;
				font-family: 微軟正黑體,新細明體,標楷體;
				font-weight: bold;
				font-size: 17px;
			}
			
			.menu {
				position:fixed;
				width: 100%;
				height: 40px;
				background-color: dimgrey;
				z-index: 9999999;
			}
			
			.menu a {
				text-decoration: none;
				color: white;
				font-family: 微軟正黑體,新細明體,標楷體;
				font-weight: bold;
				font-size: 17px;
			}
			
			.menu_css {
				float: left;
				width: 70%;
				height: inherit;
				overflow: hidden;
				font-family: 微軟正黑體,新細明體,標楷體;
				font-weight: bold;
				font-size: 17px;
				color: white;
				border-spacing: 0px;
			}
			.menu_css tr {
				display: block;
			}
			.menu_css td {
				height: 40px;
				padding: 0px 15px 0px 15px;
				white-space: nowrap;
			}
			.menu_css td:hover {
				background-color: black;
			}
			
			.menu_search{
				width: 30%;
				height: inherit;
				white-space: nowrap;
				overflow: hidden;
				font-family: 微軟正黑體,新細明體,標楷體;
				font-weight: bold;
				font-size: 17px;
				color: white;
			}
			.menu_search tr {
				display: block;
			}
			.menu_search td {
				height: 40px;
				padding: 0px 15px 0px 15px;
			}
			.menu_search td:hover {
				background-color: black;
			}
			
			.content {
				position: relative;
				word-wrap: break-word;
				width: 100%;
				top: 40px;
				background-color: #f1f1f1;
			}
			
			.inner_content {
				padding: 50px 130px 220px 130px;
			}
			
			.inner_content table {
				background-color: white;
			}
			
			li img {
				width: 100%;
				height: 100%;
			}
			
			input[type=text] {
				color: black;
			}
			
			form {
				margin-bottom: 0em;
			}
		</style>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.css">
		<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css">
		<script>
			
			function InsertContent(){
				document.getElementById("忍者名稱").value = document.getElementById("忍者名稱").value;
				document.getElementById("級別").value = document.getElementById("級別").value;
				document.getElementById("國家").value = document.getElementById("國家").value;
				document.getElementById("歲數").value = document.getElementById("歲數").value;
				document.getElementById("mfrom").action = "忍者_addsave.php";
				document.getElementById("mfrom").submit();
			}
			
			window.addEventListener( "load", start, false );
		</script>
	</head>
	<body>
		<form id="mfrom" method="post" action="編輯忍者.php">
		<div class="menu">
			<table class="menu_css">
				<tr>
					<td><a href="../忍術.php">Home</a></td>
					<td><a href="nijitsu.php">忍術</a></td>
					<td><a href="忍者.php">忍者</a></td>
					<td><a href="國家.php">國家</a></td>
					<td><a href="編輯忍術.php">編輯忍術</a></td>
					<td><a href="編輯忍者.php">編輯忍者</a></td>
					<td><a href="編輯國家.php">編輯國家</a></td>
				</tr>
			</table>
			<table class="menu_search">
				<tr>
					<td>
						<form method="post">
							Search
						  <input type="text" id="keyword" name="keyword" value="" placeholder="輸入搜尋關鍵字" />
						  <input type="submit" value="送出">				
						</form>
					</td>
				</tr>
			</table>
		</div>
		<div class="content">
		<div class="inner_content">
			<table class="table">
			  <thead>
				<tr> 
				  <th>#</th> 
				  <th>忍者名稱</th> 
				  <th>級別</th> 
				  <th>國家</th> 
				  <th>歲數</th> 
				</tr>  
			  </thead> 
			  <tbody>
					<tr> 
					  <th scope="row"><a onclick="InsertContent();">按我新增</a></th> 
					  <td><input type="text" id="忍者名稱" name="忍者名稱" value=""/></td> 
					  <td><input type="text" id="級別" name="級別" value=""/></td> 
					  <td><input type="text" id="國家" name="國家" value=""/></td> 
					  <td><input type="text" id="歲數" name="歲數" value=""/></td> 
					</tr> 
			  </tbody> 
			</table>
		</div>
	</div>
	<form>
	</body>
</html>