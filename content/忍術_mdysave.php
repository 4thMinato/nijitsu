<?php
	include("../function/condb.php");
	
	if (isset($_POST["ID"]))
	{
	  $ID = $_POST["ID"];
	  $忍術名稱 = $_POST["忍術名稱"];
	  $屬性= $_POST["屬性"];
	  $忍者名稱 = $_POST["忍者名稱"];
	  
	 if($ID == ''){
		 echo "儲存失敗!".$stmt->error;
		 $stmt->close();
		 header('Location: 編輯忍者.php');
	  }
	  
	  if($ID == ''){
		  $ID = 'XXXX'; 
	  }
	  
	  if($忍術名稱 == ''){
		  $忍術名稱 = '未知';
	  }
	  
	  
	   if($屬性 == ''){
		  $屬性 = '未知';
	  }
	  
	   if($忍者名稱 == ''){
		  $忍者名稱 = '未知';
	  }
	  
	  $sql = "UPDATE 忍術 SET 忍術名稱 = ?,屬性 = ? ,忍者名稱 = ? WHERE ID = ?";
	  if($stmt = $conn->prepare($sql)){
		  $stmt->bind_param('ssss', $忍術名稱, $屬性, $忍者名稱,$ID);
		  $stmt->execute();
		  header('Location: 編輯忍術.php');
	  }
	  else{
	  	$stmt->close();
	  	header('Location: 編輯忍術.php');
	  }
	} 
	else{
	  $ID = NULL;
	  echo "GG";
	}
	
?>