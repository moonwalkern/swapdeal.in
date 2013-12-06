<?Php
    require_once("C:\Sreeji\SwapDeal.in\php\lib\swapdealdb.class.php");
    $relatimeArray = fetch_swaprealtime("swapadmin","admin");
    //echo "Real Time Records => ".$relatimeArray."count=".count($relatimeArray); 
   /* foreach($relatimeArray as $value){
        echo"<br>";
        foreach($value as $values){
            echo $values;
           
        }    
        
    }
    */
    
   
    //echo $relatimeArray[3]['itemName'];
   /* 
    foreach($relatimeArray as $key=>$value){
        echo"<br>".$value['itemName']." ". $value['itemDe'];
        if(is_array($value)) {
            foreach($value as $k=>$v) {
                echo $k." - ".$v.' ';
            }
        } else {
            echo $key." - ".$value.' ';
        }  
          
    }
    */
    /*
    echo "<table class='imagetable'>".
         "<tr>".
    	 "<th>Page</th><th>1 of 10</th><th>&nbsp;</th><th>&nbsp;</th>";
         "</tr>";
   foreach($relatimeArray as $key=>$value){ 
         echo "<tr>";
         if(is_array($value)) {
            foreach($value as $k=>$v) {
          	     echo "<td><b>$v</b></td>";
                 
             }
         }
         "</tr>";
        
    }
    echo "</table>";
    */
    $picPlace = 'C:\\Sreeji\\SwapDeal.in\\swapitems\\';
    
    echo "<table class='imagetable'>".
         "<tr>".
    	 "<th>Page 1 of 10</th><th></th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>";
         "</tr>";
    foreach($relatimeArray as $key=>$value){
        //echo $buildPicPath."<br>";
        $picTab=picBuilder($value['itemPicLoc'], $value['itemID']);
        echo "<tr>";
        //echo "<td>".$picTab.$value['itemPicLoc']."</td><td><b>".$value['itemName']."</b></td><td>".$value['itemCategory']."</td><td>".$value['itemPrice']."</td><td>".$value['itemMobile']."</td><td>".$value['itemRegDate']."</td>";
        echo "<td>".$picTab."</td><td><b>".$value['itemName']."</b></td><td>".$value['itemCategory']."</td><td>".$value['itemPrice']."</td><td>".$value['itemMobile']."</td><td>".$value['itemRegDate']."</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    function picBuilder($picLoc,$itemID){
        $buildPicPath = "";
        $picPlace = 'http://localhost/swapdeal.in/swapitems/';
        $picS=explode(",",$picLoc);
        //echo print_r($picS);
        $buildPicPath=$picPlace.$itemID."//".$picS[0];
        //echo $buildPicPath."<br>";
        $tmp=$itemID."light";
        $buildLightPic="";
        for($iX=0;$iX<count($picS);$iX++){
            $multiplPic=$picPlace.$itemID."//".$picS[$iX];
            if($iX==0){
                $buildLightPic="<a border='0' href='".$multiplPic."' data-lightbox='".$tmp."'><img src='".$multiplPic."' alt='".$multiplPic."' border='2' width='100' height='100' hspace='10'/></a>";
            }
            else {
                $buildLightPic=$buildLightPic."<a style='display:none;' href='".$multiplPic."' data-lightbox='".$tmp."'></a>";
            }
        }
        //return "<img src='".$buildPicPath."' alt='".$buildPicPath."' border='2' width='100' height='100' hspace='10'/>";
        return $buildLightPic;
        
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