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
		
			
			window.addEventListener( "load", start, false );
		</script>
	</head>
	<body>
		<div id = "忍術" >
			
		</div>
		<div id = "忍者" >
			
		</div>
		<div id = "國家" >
			
		</div>
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
						<form method="post">
							Search
						  <input type="text" id="keyword" name="keyword" value="" placeholder="輸入搜尋關鍵字" />
						  <input type="submit" value="送出">				
						</form>
					</td>
				</tr>
			</table>
		</div>
		<div id = "form1" class="content">
			<div class="inner_content">
			<div style="text-align: left;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 15px;font-weight: bold;"></div>
				<div style="text-align: left;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 15px;font-weight: bold;">
					總數量為: 
					<?php
						$sql = "SELECT * FROM 國家";
						if($result = mysqli_query($conn,$sql)){
							$rowcount= mysqli_num_rows($result);
							echo $rowcount;
						}
					?>
				</div>
				<table border = "1" class="table">
					<caption>國家</caption>
					<thead>
						<th>#</th> 
						<th style="text-align: center;">國家名稱</th>
						<th style="text-align: center;">首領</th>
						<th style="text-align: center;">年收入</th>
						<th style="text-align: center;">年支出</th>
						<th style="text-align: center;">建設預算</th>
						<th style="text-align: center;">建設支出</th>
					</thead>
					<tbody>
				<?php
				if (isset($_POST["keyword"]))
				{
					$keyword = $_POST["keyword"];
					
					if($keyword == ''){
					  $keyword = '%';
				    }else{
					  $keyword = '%'.$keyword.'%';
				    }
					
					$sql = "SELECT 國家名稱,首領,年收入,年支出,建設預算,建設支出 FROM 國家 where 國家名稱 like ? or 首領 like ? or 年收入 like ? or 年支出 like ? or 建設預算 like ? or 建設支出 like ?";
					if($stmt = $conn->prepare($sql)){
						$stmt->bind_param("ssssss", $keyword, $keyword, $keyword, $keyword, $keyword, $keyword);
						$stmt->execute();
						$stmt->bind_result($國家名稱,$首領,$年收入,$年支出,$建設預算,$建設支出);
						$count = 0;
						while($stmt->fetch()){
						$count++;
			?>
						<tr> 
						  <th scope="row"><?php echo $count;?></th> 
						  <td><?php echo $國家名稱;?></td> 
						  <td><?php echo $首領;?></td> 
						  <td><?php echo $年收入;?></td> 
						  <td><?php echo $年支出;?></td>
						  <td><?php echo $建設預算;?></td>
						  <td><?php echo $建設支出;?></td>
						</tr> 
			<?php
						}		
					}
				}else{
					$sql = "SELECT 國家名稱,首領,年收入,年支出,建設預算,建設支出 FROM 國家";
					if($stmt = $conn->prepare($sql)){
						$stmt->execute();
						$result = $stmt->get_result();
						$count = 0;
						
						while($rows = $result->fetch_assoc()){
						$count++;
			?>
					<tr> 
					  <th scope="row"><?php echo $count;?></th> 
					  <td><?php echo $rows['國家名稱'];?></td> 
					  <td><?php echo $rows['首領'];?></td> 
					  <td><?php echo $rows['年收入'];?></td> 
					  <td><?php echo $rows['年支出'];?></td>
					  <td><?php echo $rows['建設預算'];?></td>
					  <td><?php echo $rows['建設支出'];?></td>
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
	</body>
</html>