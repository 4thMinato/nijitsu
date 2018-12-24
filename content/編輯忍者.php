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
			
			function ChangeContent(忍者名稱){
				document.getElementById("忍者名稱").value = 忍者名稱;
				document.getElementById("mfrom").action = "編輯忍者.php";
				document.getElementById("mfrom").submit();
			}
			
			function UpdateContent(){
				document.getElementById("忍者名稱").value = document.getElementById("忍者名稱").value;
				document.getElementById("級別").value = document.getElementById("級別").value;
				document.getElementById("國家").value = document.getElementById("國家").value;
				document.getElementById("歲數").value = document.getElementById("歲數").value;
				document.getElementById("mfrom").action = "忍者_mdysave.php";
				document.getElementById("mfrom").submit();
			}
			
			function DeleteContent(){
				document.getElementById("忍者名稱").value = document.getElementById("忍者名稱").value;
				document.getElementById("mfrom").action = "忍者_delsave.php";
				document.getElementById("mfrom").submit();
			}
			
			function InsertContent(){
				document.getElementById("mfrom").action = "忍者_add.php";
				document.getElementById("mfrom").submit();
			}
			
		</script>
	</head>
	<body>
	<form id="mfrom" method="post" action="編輯忍者.php">
		<input type="hidden" id="忍者名稱" name="忍者名稱" value="<?php echo isset($_POST["忍者名稱"])?$_POST["忍者名稱"]:""?>">
		<div class="menu">
			<table class="menu_css">
				<tr>
					<td><a href="../index.php">Home</a></td>
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
						<form method="post" action="忍者.php">
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
				  <input class="btn btn-default" type="button" value="新增" onclick="InsertContent();">
				  <div style="text-align: left;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 15px;font-weight: bold;">
					總數量為: 
					<?php
						$sql = "SELECT * FROM 忍者";
						if($result = mysqli_query($conn,$sql)){
							$rowcount= mysqli_num_rows($result);
							echo $rowcount;
						}
					?>
				  </div>
					<?php
						if(isset($_POST["忍者名稱"]) && !empty($_POST["忍者名稱"])){
							$忍者名稱 = $_POST["忍者名稱"];
							
							$sql = "SELECT 忍者名稱,級別 ,國家,歲數 FROM 忍者 WHERE 忍者名稱 = ?";
							if($stmt = $conn->prepare($sql)){
							$stmt->bind_param("s", $忍者名稱);
							$stmt->execute();
							$stmt->bind_result($忍者名稱,$級別,$國家,$歲數);				
							if($stmt->fetch()){						
					?>
							<thead>
								<tr> 
								  <th>#</th> 
									<th style="text-align: center;">忍者名稱</th>
									<th style="text-align: center;">級別</th>
									<th style="text-align: center;">國家</th>
									<th style="text-align: center;">歲數</th>
								</tr>  
							  </thead> 
							<tbody> 
							<tr> 
							  <th scope="row">
								<a class="btn btn-default" role="button" onclick="UpdateContent();">按我更新</a>
								<a class="btn btn-default" role="button" onclick="DeleteContent();">按我刪除</a>
							  </th> 
							  <td><?php echo $忍者名稱;?>
							  <td><input type="text" id="級別" name="級別" value="<?php echo $級別;?>"/></td> 
							  <td><input type="text" id="國家" name="國家" value="<?php echo $國家;?>"/></td> 
							  <td><input type="text" id="歲數" name="歲數" value="<?php echo $歲數;?>"/></td> 
							</tr> 
					<?php
							}
							}
						}else if (isset($_POST["keyword"]) && !empty($_POST["keyword"])){
							$keyword = $_POST["keyword"];
							
							if($keyword == ''){
							  $keyword = '%';
							}else{
							  $keyword = '%'.$keyword.'%';
							}
							
							$sql = "SELECT t.忍者名稱,t.級別 ,t.國家,t.歲數,ts.ID,ts.忍術名稱,ts.屬性, `忍者` t left join `忍術` ts on t.忍者名稱 = ts.忍者名稱 WHERE t.忍者名稱 like ? or t.級別 like ? or t.國家 like ? or t.歲數 like ? or ts.忍術名稱 like ?";
							if($stmt = $conn->prepare($sql)){
							$stmt->bind_param("sssss", $keyword, $keyword, $keyword, $keyword, $keyword);
							$stmt->execute();
							$stmt->bind_result($忍者名稱,$級別,$國家,$歲數,$忍術名稱);
							$count = 0;
					?>	
							<thead>
								<tr> 
								  <th>#</th> 
									<th style="text-align: center;">忍者名稱</th>
									<th style="text-align: center;">級別</th>
									<th style="text-align: center;">國家</th>
									<th style="text-align: center;">歲數</th> 
									<th style="text-align: center;">忍術名稱</th> 
								</tr>  
							  </thead> 
							  <tbody> 
					<?php
							while($stmt->fetch()){
							$count++;
					?>			
								<tr> 
								  <th scope="row"><?php echo $count;?></th> 
								  <td>
									<a onclick="ChangeContent('<?php echo $忍者名稱;?>');"><?php echo $忍者名稱;?></a>
								  </td> 
								  <td><?php echo $級別;?></td> 
								  <td><?php echo $國家;?></td> 
								  <td><?php echo $歲數;?></td> 
								  <td><?php echo $忍術名稱;?></td> 
								</tr> 
					<?php
							}			
							}
						}else{
							$sql = "SELECT t.忍者名稱,t.級別 ,t.國家,t.歲數,ts.ID,ts.忍術名稱,ts.屬性 FROM `忍者` t left join `忍術` ts on t.忍者名稱 = ts.忍者名稱 ";
							if($stmt = $conn->prepare($sql)){
							$stmt->execute();
							$result = $stmt->get_result();
							$count = 0;
					?>	
							<thead>
								<tr> 
								  <th>#</th> 
									<th style="text-align: center;">忍者名稱</th>
									<th style="text-align: center;">級別</th>
									<th style="text-align: center;">國家</th>
									<th style="text-align: center;">歲數</th> 
									<th style="text-align: center;">忍術名稱</th> 
								</tr>  
							  </thead> 
							  <tbody> 
					<?php
							while($rows = $result->fetch_assoc()){
							$count++;
					?>			
							<tr> 
							  <th scope="row"><?php echo $count;?></th> 
							  <td>
								<a onclick="ChangeContent('<?php echo $rows['忍者名稱'];?>');"><?php echo $rows['忍者名稱'];?></a>
							  </td> 
							  <td><?php echo $rows['級別'];?></td> 
							  <td><?php echo $rows['國家'];?></td> 
							  <td><?php echo $rows['歲數'];?></td> 
							  <td><?php echo $rows['忍術名稱'];?></td> 
							</tr> 
					<?php
							}
							}
						}
					?>
				  </tbody> 
				</table>
			</div>
		</div>
	</form>
	</body>
</html>