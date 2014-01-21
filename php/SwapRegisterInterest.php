<?Php
    require_once("C:\Sreeji\SwapDeal.in\php\lib\swapdealdb.class.php");
    require_once("C:\Sreeji\SwapDeal.in\php\lib\class.phpmailer.php");
    ini_set("log_errors", 1);
    ini_set("error_log", "C:\\Sreeji\\SwapDeal.in\\log\\error.log");
    error_log( "SwapRegisterInterest Class" );
    //echo $_GET['username'];    
    $insertuser = array(
        'customername' => $_GET['name'],
        'customermobile' => $_GET['mobile'],
        'customeremail' => $_GET['email'],
        'itemid' => $_GET['itemID'],
        'userid' => $_GET['email'],
        'customernote' => $_GET['note'],
        'customerrate' => $_GET['rate']
        );
    //echo print_r($insertuser); 
    error_log(print_R($insertuser,TRUE) );
    //error_log(print_r($insertuser));  
    $usernameExist = check_username($insertuser['userid']);     
    //echo "user:".$usernameExist['id'];
    error_log(print_R($usernameExist,TRUE) );
    //error_log("User Exisit:".$usernameExist['id']);
    if($usernameExist > 0){
        $relatimeArray = fetch_swapregisterinterest($insertuser);
        if($relatimeArray == 1){
            echo "<p>Failure</p>";
            die;
        }else {
            echo "<p>Your interest has been registered & send to seller, mail would be send with seller contact details.</p>";
            $itemArray = fetch_swapitemdetails($insertuser['itemid']);
            //print_r($itemArray);
            $createmailArray = array(
                'buyername' => $insertuser['customername'],
                'sellername' => $itemArray['name'],
                'buyermobile' => $insertuser['customermobile'],
                'sellermobile' => $itemArray['mobile'],
                'buyeremail' => $insertuser['customeremail'],
                'selleremail' => $itemArray['email'],
                'customernote' => $insertuser['customernote'],
                'customerrate' => $insertuser['customerrate']
            );
            //print_r($createmailArray);
            if($itemArray['itemPrice'] == null){
                $sellerPrice = "Call Me for Price";
            }else {
                $sellerPrice = $itemArray['itemPrice'];
            }
            $initEmailArrayBuyer = array (
                'toemail' => $createmailArray['buyeremail'],
                'name' => $createmailArray['buyername'],
                'subject' => 'Item Registration info from SwapDeal',
                'mobile' => $createmailArray['buyermobile'],
                'itemname' => $itemArray['itemName'],
                'itemdec' => $itemArray['itemDesc'],
                'sellername' => $createmailArray['sellername'],
                'selleremail' => $createmailArray['selleremail'],
                'sellermobile' => $createmailArray['sellermobile'],
                'sellerprice' => $sellerPrice
            );
            error_log(print_R($initEmailArrayBuyer,TRUE) );
            //print_r($initEmailArrayBuyer);
            sendSwapMail($initEmailArrayBuyer, "buyer");
            
            $initEmailArraySeller = array (
                'toemail' => $createmailArray['selleremail'],
                'name' => $createmailArray['sellername'],
                'subject' => 'Item Express Interest info from SwapDeal',
                'mobile' => $createmailArray['sellermobile'],
                'itemname' => $itemArray['itemName'],
                'itemdec' => $itemArray['itemDesc'],
                'buyername' => $createmailArray['buyername'],
                'buyeremail' => $createmailArray['buyeremail'],
                'buyermobile' => $createmailArray['buyermobile'],
                'buyerprice' => $createmailArray['customerrate'],
                'buyernote' => $createmailArray['customerrate']
                
            );
            error_log(print_R($initEmailArraySeller,TRUE) );
            //print_r($initEmailArraySeller);
            sendSwapMail($initEmailArraySeller, "seller");
            
        }
    }else{
        echo "<p>Username already exist, please select a different</p>";
        die;
    }    
    
    function fetch_swapregisterinterest($registerArray)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "swapdeal";
        DB::$password = "swapdeal";
        DB::$host = "127.0.0.1";
        DB::$port = 3307;
        DB::$error_handler = false; // since we're catching errors, don't need error handler
        DB::$throw_exception_on_error = true;
        $realtimeData = 0;
        try{
            DB::insert("swapitemregister", $registerArray);    
        }catch(SwapDealDBException $e) {
            echo "Error: " . $e->getMessage() . "<br>\n"; // something about duplicate keys
            echo "SQL Query: " . $e->getQuery() . "<br>\n"; // INSERT INTO accounts...
            $realtimeData = 1;
        }   
        
        return $realtimeData;
    }
    
    function fetch_swapitemdetails($itemid)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "swapdeal";
        DB::$password = "swapdeal";
        DB::$host = "127.0.0.1";
        DB::$port = 3307;
        
        
        //print_r(DB::query("SELECT * FROM swapdeal.swapuser WHERE username=%s AND password=%s", "swapadmin", "admin"));
        
        $itemArray = DB::queryFirstRow("SELECT * from swapitems a, swapdeal.swapuser b where a.itemContactId=b.id and a.itemID=%s" , $itemid);

        return $itemArray;
    }
    
    
    function fetch_swapinsertuser($userdetailsArray)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "swapdeal";
        DB::$password = "swapdeal";
        DB::$host = "127.0.0.1";
        DB::$port = 3307;
        DB::$error_handler = false; // since we're catching errors, don't need error handler
        DB::$throw_exception_on_error = true;
        $realtimeData = 0;
        try{
            DB::insert("swapuser", $userdetailsArray);    
        }catch(SwapDealDBException $e) {
            echo "Error: " . $e->getMessage() . "<br>\n"; // something about duplicate keys
            echo "SQL Query: " . $e->getQuery() . "<br>\n"; // INSERT INTO accounts...
            $realtimeData = 1;
        }   
        
        return $realtimeData;
    }
    
    function check_username($username)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "swapdeal";
        DB::$password = "swapdeal";
        DB::$host = "127.0.0.1";
        DB::$port = 3307;
        
        
        //print_r(DB::query("SELECT * FROM swapdeal.swapuser WHERE username=%s AND password=%s", "swapadmin", "admin"));
        
        $userArray = DB::queryFirstRow("SELECT * FROM swapuser WHERE username=%s" , $username);
        
        return $userArray;
    }
    
    function sendSwapMail($insertuser,$type){
        $mail = new PHPMailer();  // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->IsHTML(true);
        $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true;  // authentication enabled
        //$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        //$mail->Host = 'smtp.gmail.com';
        $mail->Host = 'smtp.rediffmailpro.com';
        $mail->Port = 587; 
        //$mail->Username = 'moonwalker.n@gmail.com';  
        $mail->Username = 'sreeji.gopal@swapdeal.in';
        $mail->Password = 'cool2700';
        $from = 'sreeji.gopal@swapdeal.in';          
        $from_name = $insertuser['name'];
        $subject = $insertuser['subject']; //"Joining mail from swapdeal";
        $body = "Your welcome to sWAPdeal.in, where you can buy/sell for free";
        $to = $insertuser['toemail'];
        $mail->SetFrom($from, $from_name);
        $mail->Subject = $subject;
        //$mail->Body = buildSwapBody($insertuser);
        if($type=="buyer")
            $mail->MsgHTML(buildSwapBodyBuyer($insertuser));
        else
            $mail->MsgHTML(buildSwapBodySeller($insertuser));
        $mail->AddAddress($to);
        if(!$mail->Send()) {
            $error = 'Mail error: '.$mail->ErrorInfo; 
            echo $error;
            return false;
        } else {
            $error = 'Message sent!';
            echo $error;
            return true;
        }
    }
    
    function buildSwapBodyBuyer($insertuser){
            $message = '<html><body>';
			$message .= 'SwapDeal.in';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($insertuser['name']) . "</td></tr>";
			$message .= "<tr><td><strong>Item Name:</strong> </td><td>" . strip_tags($insertuser['itemname']) . "</td></tr>";
            $message .= "<tr><td><strong>Item Description:</strong> </td><td>" . strip_tags($insertuser['itemdec']) . "</td></tr>";
			$message .= "<tr><td><strong>Seller Name:</strong> </td><td>" . strip_tags($insertuser['sellername']) . "</td></tr>";
            $message .= "<tr><td><strong>Seller Email:</strong> </td><td>" . strip_tags($insertuser['selleremail']) . "</td></tr>";
            $message .= "<tr><td><strong>Seller Mobile:</strong> </td><td>" . strip_tags($insertuser['sellermobile']) . "</td></tr>";
            $message .= "<tr><td><strong>Seller Price:</strong> </td><td>" . strip_tags($insertuser['sellerprice']) . "</td></tr>";
			
			$message .= "</table>";
			$message .= "</body></html>";
            return $message;
    }
    function buildSwapBodySeller($insertuser){
            $message = '<html><body>';
			$message .= 'SwapDeal.in';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($insertuser['name']) . "</td></tr>";
			$message .= "<tr><td><strong>Item Name:</strong> </td><td>" . strip_tags($insertuser['itemname']) . "</td></tr>";
            $message .= "<tr><td><strong>Item Description:</strong> </td><td>" . strip_tags($insertuser['itemdec']) . "</td></tr>";
			$message .= "<tr><td><strong>Buyer Name:</strong> </td><td>" . strip_tags($insertuser['buyername']) . "</td></tr>";
            $message .= "<tr><td><strong>Buyer Email:</strong> </td><td>" . strip_tags($insertuser['buyeremail']) . "</td></tr>";
            $message .= "<tr><td><strong>Buyer Mobile:</strong> </td><td>" . strip_tags($insertuser['buyermobile']) . "</td></tr>";
            $message .= "<tr><td><strong>Buyer Price:</strong> </td><td>" . strip_tags($insertuser['buyerprice']) . "</td></tr>";
			
			$message .= "</table>";
			$message .= "</body></html>";
            return $message;
    }
?>