<?Php
    require_once("C:\Sreeji\SwapDeal.in\php\lib\swapdealdb.class.php");
    
    $picPlace = 'C:\\Sreeji\\SwapDeal.in\\swapitems\\';
    
    
    
    $relatimeArray = fetch_swaprealtime("swapadmin","admin");    
    
    $picS=explode(",","zz,sss,sss");
    //echo is_array($picS)."<br>";
    foreach($relatimeArray as $key=>$value){
        $picS=explode(",",$value['itemPicLoc']);
        //echo print_r($picS);
        $buildPicPath=$picPlace.$value['itemID']."\\".$picS[0];
        //echo $buildPicPath."<br>";
        echo "<img src='".$buildPicPath."' alt='".$buildPicPath."'/>";
        $buildPicPath = "";
    }
    
    function fetch_swaprealtime($username, $passowrd)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "root";
        DB::$password = "admin";
        
        $realtimeData = DB::query("SELECT * FROM swapitems", "swapadmin", "admin");
        
        //$number_user = DB::queryFirstField("SELECT COUNT(*) FROM swapitems");
        return $realtimeData;
    }
    
    
?>