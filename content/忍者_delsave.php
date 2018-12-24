<?php
	include("../function/condb.php");
	
	if (isset($_POST["忍者名稱"]) && !empty($_POST["忍者名稱"]))
	{
	  $忍者名稱 = $_POST["忍者名稱"];
	  
	  $sql = "DELETE FROM 忍者 WHERE 忍者名稱 = ?";
	  if($stmt = $conn->prepare($sql)){
		  $stmt->bind_param('s', $忍者名稱);
		  $stmt->execute();
		  
		  if ($stmt->errno) {
			echo "刪除失敗!".$stmt->error;
			$stmt->close();
		  }else{
			$stmt->close();
			header('Location: 編輯忍者.php');
		  }
	  }
	} 
	else 
	{
	  $忍者名稱 = NULL;
	  echo "沒有這名忍者";
	}	
	
	
?>