<?php
	include("../function/condb.php");
	
	if (isset($_POST["國家名稱"]))
	{
	  $國家名稱 = $_POST["國家名稱"];
	  $首領 = $_POST["首領"];
	  $年收入= $_POST["年收入"];
	  $年支出 = $_POST["年支出"];
	  $建設預算 = $_POST["建設預算"];
	  $建設支出 = $_POST["建設支出"];
	  
	 if($國家名稱 == ''){
		 echo "儲存失敗!".$stmt->error;
		 $stmt->close();
		 header('Location: 編輯國家.php');
	  }
	  
	  if($首領 == ''){
		  $首領 = '龍王信徒'; 
	  }
	  
	  if($年收入 == ''){
		  $年收入 = '未知';
	  }
	  
	   if($年支出 == ''){
		  $年支出 = '未知';
	  }
	  
	   if($建設預算 == ''){
		  $建設預算 = '未知';
	  }
	  
	   if($建設支出 == ''){
		  $建設支出 = '未知';
	  }
	  
	  $sql = "UPDATE 國家 SET 首領 = ?,年收入 = ? ,年支出 = ?,建設預算 = ?,建設支出 = ? WHERE 國家名稱 = ?";
	  if($stmt = $conn->prepare($sql)){
		  $stmt->bind_param('ssss', $首領, $年收入, $年支出, $建設預算,$建設支出,$國家名稱);
		  $stmt->execute();
		  header('Location: 編輯國家.php');
	  }
	  else{
	  	$stmt->close();
	  	header('Location: 編輯國家.php');
	  }
	} 
	else{
	  $國家名稱 = NULL;
	  echo "GG";
	}
	
?>