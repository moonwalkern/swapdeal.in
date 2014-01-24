<?php
session_start();
require_once("C:\Sreeji\SwapDeal.in\php\lib\swapdealdb.class.php");
ini_set("log_errors", 1);
ini_set("error_log", "C:\\Sreeji\\SwapDeal.in\\log\\error.log");
error_log( "ImageUpload Class" );
$picPlace = 'C:\\Sreeji\\SwapDeal.in\\swapitems\\';
error_log("current sessionid:".session_id());
error_log($_FILES['uploadfile']['name']);
error_log("Post...:".print_R($_POST,TRUE));
error_log(print_R($_FILES,TRUE) );

$picname = $_FILES['uploadfile']['name'];
$getpicext = strstr($picname,".");
$picname = $_POST['itemid'].$getpicext;
error_log($picname."--".$getpicext);
error_log(print_r($_SESSION, TRUE));



if($_POST['itemid'] == "1"){
    $insertitems = array(
        'sessionid' => session_id(),
        'pic1' => $_POST['itemid'].$getpicext
        );
    
}else if($_POST['itemid'] == "2"){
    $insertitems = array(
        'sessionid' => session_id(),
        'pic2' => $_POST['itemid'].$getpicext
        );
    
}else if($_POST['itemid'] == "3"){
    $insertitems = array(
        'sessionid' => session_id(),
        'pic3' => $_POST['itemid'].$getpicext
        );
    
}else if($_POST['itemid'] == "4"){
    $insertitems = array(
        'sessionid' => session_id(),
        'pic4' => $_POST['itemid'].$getpicext
        );
}

$picPlace = $picPlace.$nextitemID;
error_log("picplace:".$picPlace);
//Create a new directory for storing new items, the directory name will be of the itemid
if (!file_exists($picPlace)) {
    mkdir($picPlace, 0777, true);
}
$uploaddir = $picPlace."\\"; 
//$file = $uploaddir ."swapdeal_".basename($_FILES['uploadfile']['name']); 
$file = $uploaddir .basename($picname);
error_log($file);
$file_name= "swapdeal_".$_FILES['uploadfile']['name']; 
 
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  echo $nextitemID; 
} else {
	echo "error";
}

function update_swapinsertitems($itemid,$itemPic)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "swapdeal";
        DB::$password = "swapdeal";
        DB::$host = "127.0.0.1";
        DB::$port = 3307;
        $itemPicTmp = $itemPic;
        $itemPictemp = fetch_swapgetitemid($itemid);
        error_log("pic :".$itemPictemp." new:".$itemPic." strpos:".strpos($itemPictemp,$itemPic));
        if(strpos($itemPictemp,$itemPic) >= 0){
            
            $itemPicTmp = $itemPictemp.",".$itemPic;
            
            error_log("final pic:".$itemPicTmp);    
        }
        $updateitems = array(
                'itemPicLoc' => $itemPicTmp
        );
        error_log(print_R($updateitems, TRUE));
        error_log("Pic location:".$itemPicTmp);
        
        $itemID = DB::update('swapitems',$updateitems,"itemID=%i",$itemid);
    }
    

function fetch_swapgetitemid($itemid)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "swapdeal";
        DB::$password = "swapdeal";
        DB::$host = "127.0.0.1";
        DB::$port = 3307;
        
        $itemPictemp = DB::queryFirstField("SELECT itemPicLoc FROM swapitems where itemID=%i",$itemid);
        
        //$number_user = DB::queryFirstField("SELECT COUNT(*) FROM swapitems");
        return $itemPictemp;
    }
    
function insert_swapinsertitems($insertitems)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "swapdeal";
        DB::$password = "swapdeal";
        DB::$host = "127.0.0.1";
        DB::$port = 3307;
        DB::insert('swapitems',$insertitems);
        $itemID = DB::insertId();
        error_log("next item id :".$itemID);
        //$number_user = DB::queryFirstField("SELECT COUNT(*) FROM swapitems");
        return $itemID;
    }    

function insert_tmpitems($insertitems)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "swapdeal";
        DB::$password = "swapdeal";
        DB::$host = "127.0.0.1";
        DB::$port = 3307;
        DB::insert('tempswapitems',$insertitems);
        $itemID = DB::insertId();
        error_log("next item id :".$itemID);
        //$number_user = DB::queryFirstField("SELECT COUNT(*) FROM swapitems");
        return $itemID;
    }   


?>