<?php
  include("../function/condb.php");
	
  $忍者名稱 = $_POST["忍者名稱"];
  $級別= $_POST["級別"];
  $國家 = $_POST["國家"];
  $歲數 = $_POST["歲數"];
  
  if($忍者名稱 == ''){
	 echo "儲存失敗!".$stmt->error;
     $stmt->close();
	 header('Location: 編輯忍者.php');
  }
  
  if($級別 == ''){
	  $級別 = '拉基';
  }
  
  if($國家 == ''){
	  $國家 = '未知';
  }
  
   if($歲數 == ''){
	  $歲數 = '未知';
  }
  
  $sql = "INSERT INTO 忍者 (忍者名稱,級別,國家,歲數) values (?,?,?,?)";
  if($stmt = $conn->prepare($sql)){
  $stmt->bind_param('ssss', $忍者名稱, $級別, $國家, $歲數);
  $stmt->execute();
  
  if ($stmt->errno) {
    echo "儲存失敗!".$stmt->error;
    $stmt->close();
	header('Location: 編輯忍者.php');
  }else{
  	$忍者名稱 = mysqli_insert_id($conn);
	header('Location: 編輯忍者.php');
  }
  
  }
?>