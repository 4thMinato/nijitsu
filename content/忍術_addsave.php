<?php
  include("../function/condb.php");
	
  $ID = $_POST["ID"];
  $忍術名稱= $_POST["忍術名稱"];
  $屬性 = $_POST["屬性"];
  $忍者名稱 = $_POST["忍者名稱"];
  
  if($ID == ''){
	 echo "儲存失敗!".$stmt->error;
     $stmt->close();
	 header('Location: 編輯忍術.php');
  }
  
  if($忍術名稱 == ''){
	 echo "儲存失敗!".$stmt->error;
     $stmt->close();
	 header('Location: 編輯忍術.php');
  }
  
  if($屬性 == ''){
	  $屬性 = '未知';
  }
  
   if($忍者名稱 == ''){
	  $忍者名稱 = '未知';
  }
  
  $sql = "INSERT INTO 忍術 (ID,忍術名稱,屬性,忍者名稱) values (?,?,?,?)";
  if($stmt = $conn->prepare($sql)){
  $stmt->bind_param('ssss', $ID, $忍術名稱, $屬性, $忍者名稱);
  $stmt->execute();
  
  if ($stmt->errno) {
    echo "儲存失敗!".$stmt->error;
    $stmt->close();
	header('Location: 編輯忍術.php');
  }else{
  	$ID = mysqli_insert_id($conn);
	header('Location: 編輯忍術.php');
  }
  
  }
?>