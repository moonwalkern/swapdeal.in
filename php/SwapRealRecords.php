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
    
    ini_set("log_errors", 1);
    ini_set("error_log", "C:\\Sreeji\\SwapDeal.in\\log\\error.log");
    error_log( "SwapRealRecords Class" );
    $picPlace = 'C:\\Sreeji\\SwapDeal.in\\swapitems\\';
    $itemPlace = "Pune";
    $i=10;
    $output = "";
    //echo "<table class='curvedEdges'>".
    $output =  "<div class='CSSTableGenerator'>".
         "<table>".
         "<tr>".
         "<td>Page 1 of 10</td>".
         "<td>&nbsp;</td>".
         "<td>Price</td>".
         "<td>Date</td>".
         "</tr>";
    foreach($relatimeArray as $key=>$value){
        $i++;
        if($value['itemRegDate'] != "")
            $valid_date = date( 'd/M/Y', strtotime($value['itemRegDate']));
        else
            $valid_date="";
        $isAgent = ($value['itemAgent'] == '0' ? 'Agent' : 'Individual');
        $isUsed = ($value['itemUsed'] == '0' ? 'Used' : 'New');
        $isSwap = ($value['itemSwap'] == '0' ? 'sWap(Yes)' : 'sWap(No)');    
        $itemDets = "<p><span style='font-size: medium; font-family: 'comic sans ms', sans-serif; color: #0000ff;'>".$itemPlace.": ".$value['itemName']."</span><br /><span style='font-size: small; color: #808080;'>".substr($value['itemDesc'],0,30)."...</span><br /><strong><span style='font-size: small; font-family: arial, helvetica, sans-serif; color: #000080;'>".$isAgent."&nbsp;<span style='color: #ff0000;'>".$isUsed."</span>&nbsp;<span style='color: #008000; background-color: #ffffff;'>".$isSwap."</span></strong></p>";
        $itemPrice = "<strong><span style='color: #000000;font-size: medium;'>".($value['itemPrice'] != NULL ? 'Rs. '.$value['itemPrice'] : 'Call Me for Price')."</span></strong><br><button id='create-user' value='".$value['itemID']."'>Buy</button></br>";
        $itemDate = "<em><span style='font-size: small; font-family: arial, helvetica, sans-serif; color: #808080;'>".$valid_date."</span></em>";
                //echo $valid_date;h
        //echo $buildPicPath."<br>";
        $picTab = picBuilder($value['itemPicLoc'], $value['itemID']);
       
        $output = $output."<tr>";
        //echo "<td>".$picTab.$value['itemPicLoc']."</td><td><b>".$value['itemName']."</b></td><td>".$value['itemCategory']."</td><td>".$value['itemPrice']."</td><td>".$value['itemMobile']."</td><td>".$value['itemRegDate']."</td>";
        $output = $output."<td>".$picTab."</td><td>".$itemDets."</b></td><td>".$itemPrice."</td><td>".$itemDate."</td>";
        $output = $output."</tr>";
       
        
    }
        
    $output = $output."</table>";
    $output = $output."</div>";
    error_log( "HTML ".$output );
    echo $output;
    $defSwapIcon="'http://localhost//swapdeal.in//icon//sWapIcon.jpg'";
    function picBuilder($picLoc,$itemID){
        $buildPicPath = "";
        $picPlace = 'http://localhost/swapdeal.in/swapitems/';
        $picS=explode(",",$picLoc);
        //echo $itemID." ".count($picS)."<br>";
        $buildPicPath=$picPlace.$itemID."//".$picS[0];
        //echo $buildPicPath."<br>";
        $tmp=$itemID."light";
        $buildLightPic="";
        if (count($picS) == 1 ){
            $buildLightPic="<img src='http://localhost/swapdeal.in/icon/sWapIcon.jpg' alt='' border='2' width='100' height='100' hspace='10'/>";
            
        }
        else {
            for($iX=0;$iX<count($picS);$iX++){
                $multiplPic=$picPlace.$itemID."//".$picS[$iX];
                if($iX==0){
                    $buildLightPic="<a border='0' href='".$multiplPic."' data-lightbox='".$tmp."'><img src='".$multiplPic."' alt='".$multiplPic."' border='2' width='100' height='100' hspace='10'/></a>";
                }
                else {
                    $buildLightPic=$buildLightPic."<a style='display:none;' href='".$multiplPic."' data-lightbox='".$tmp."'></a>";
                }
            }
        }
        //return "<img src='".$buildPicPath."' alt='".$buildPicPath."' border='2' width='100' height='100' hspace='10'/>";
        return $buildLightPic;
        
    }
    
    function fetch_swaprealtime($username, $passowrd)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "swapdeal";
        DB::$password = "swapdeal";
        DB::$host = "127.0.0.1";
        DB::$port = 3307;
        
        $realtimeData = DB::query("SELECT * FROM swapitems", "swapadmin", "admin");
        
        //$number_user = DB::queryFirstField("SELECT COUNT(*) FROM swapitems");
        return $realtimeData;
    }
    
    
?>