<?php
	include("../function/condb.php");
	
	if (isset($_POST["ID"]) && !empty($_POST["ID"]))
	{
	  $ID = $_POST["ID"];
	  
	  $sql = "DELETE FROM 忍術 WHERE ID = ?";
	  if($stmt = $conn->prepare($sql)){
		  $stmt->bind_param('s', $ID);
		  $stmt->execute();
		  
		  if ($stmt->errno) {
			echo "刪除失敗!".$stmt->error;
			$stmt->close();
		  }else{
			$stmt->close();
			header('Location: 編輯忍術.php');
		  }
	  }
	} 
	else 
	{
	  $ID = NULL;
	  echo "沒有這個忍術";
	}	
	
	
?>