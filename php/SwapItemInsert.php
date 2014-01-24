<?php

/**
 * @author SreejiGopal
 * @copyright 2014
 */

require_once("C:\Sreeji\SwapDeal.in\php\lib\swapdealdb.class.php");
require_once("C:\Sreeji\SwapDeal.in\php\lib\class.phpmailer.php");
require_once("C:\Sreeji\SwapDeal.in\php\SwapInsertUser.php");
session_start();
ini_set("log_errors", 1);
ini_set("error_log", "C:\\Sreeji\\SwapDeal.in\\log\\error.log");
error_log( "SwapItemInsert Class" );
error_log("current sessionid:".session_id());



error_log(print_R($_POST,TRUE));

error_log(print_R($_SESSION,TRUE));


if(!isset($_SESSION['sessionid'])){
 $updateItemID = 0;
}
else if($_SESSION['sessionid'] != session_id()){ //This is to make sure we have fresh insert of data
    //geting the next itemid from swapitem table
    $updateItemID = 0;
}else {
    $updateItemID = $_SESSION['itemID'];
}    
error_log("item id " .$_SESSION['itemID']);
    
    $insertuser = array(
        'name' => $_POST['customername'],
        'username' => $_POST['customeremail'],
        'password' => rand_string(8),
        'mobile' => $_POST['customerphone'],
        'email' => $_POST['customeremail']
        );
        
    error_log(print_R($insertuser, TRUE));    
    $usercreationResult = createUser($insertuser, FALSE);
    $userSplit =  explode(",", $usercreationResult);
    error_log("Create User:".$userSplit[0]);
    error_log("User Type :".$userSplit[1]);
    $usercreationResult = $userSplit[0];
    
    $insertitemsArray = array(
        'itemID' => $updateItemID,
        'itemName' => $_POST['title'],
        'itemCategory' => $_POST['category'],
        'itemSubCategory' => $_POST['feature1'],
        'itemPrice' => $_POST['price'],
        'itemContactId' => $usercreationResult,
        'itemMobile' => $_POST['customerphone'],
        'itemAddress' => $_POST['customeremail'],
        'itemAgent' => $_POST['customertype'],
        'itemDesc' => $_POST['itemdesc'],
        'itemUsed' => 1,
        'itemSwap' => 1
    );
    error_log(print_R($insertitemsArray,TRUE));
    
    if(!isset($_SESSION['sessionid'])){
        $_SESSION['sessionid'] = session_id();
        $nextitemID = insert_swapinsertitems($insertitemsArray);
        $_SESSION['itemID'] = $nextitemID;
    }
    else if($_SESSION['sessionid'] != session_id()){ //This is to make sure we have fresh insert of data
    $_SESSION['sessionid'] = session_id();
    //geting the next itemid from swapitem table
        $nextitemID = insert_swapinsertitems($insertitemsArray);
        $_SESSION['itemID'] = $nextitemID;
    }else {
        update_swapinsertitems($insertitemsArray, $updateItemID);
    }  
    
    error_log("success, session getting destroyed");
    session_regenerate_id();
    error_log("success, session getting destroyed, done");
    if($userSplit[1] == "New"){
        echo "Item Record created, and new user created, pleaes login to check your status";    
    }else{
        echo "Item Record created, pleaes login to check your status";
    }
    
    //
//}else {                         //This is to make sure we do update of data
//    $nextitemID = $_SESSION['itemID'];
//    
//    //error_log(print_R($updateitems, TRUE));
//    update_swapinsertitems($nextitemID,$picname);
//}


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


function update_swapinsertitems($insertitemsArray, $itemid)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "swapdeal";
        DB::$password = "swapdeal";
        DB::$host = "127.0.0.1";
        DB::$port = 3307;
        
        $itemID = DB::update('swapitems',$insertitemsArray,"itemID=%i",$itemid);
    }
    
    function rand_string( $length ) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);

    }


?>