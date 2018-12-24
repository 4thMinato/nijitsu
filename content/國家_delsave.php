<?php
	include("../function/condb.php");
	
	if (isset($_POST["國家名稱"]) && !empty($_POST["國家名稱"]))
	{
	  $國家名稱 = $_POST["國家名稱"];
	  
	  $sql = "DELETE FROM 國家 WHERE 國家名稱 = ?";
	  if($stmt = $conn->prepare($sql)){
		  $stmt->bind_param('s', $國家名稱);
		  $stmt->execute();
		  
		  if ($stmt->errno) {
			echo "刪除失敗!".$stmt->error;
			$stmt->close();
		  }else{
			$stmt->close();
			header('Location: 編輯國家.php');
		  }
	  }
	} 
	else 
	{
	  $國家名稱 = NULL;
	  echo "沒有這個國家";
	}	
	
	
?>