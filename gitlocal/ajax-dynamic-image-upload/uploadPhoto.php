<?php
ini_set("log_errors", 1);
ini_set("error_log", "C:\\Sreeji\\SwapDeal.in\\log\\error.log");
error_log( "ImageUpload Class" );
$picPlace = 'C:\\Sreeji\\SwapDeal.in\\swapitems\\';
$uploaddir = $picPlace; 
$file = $uploaddir ."webinfopedia_".basename($_FILES['uploadfile']['name']); 
error_log($file);
$file_name= "webinfopedia_".$_FILES['uploadfile']['name']; 
 
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  echo "success"; 
} else {
	echo "error";
}
?>
