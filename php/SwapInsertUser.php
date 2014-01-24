<?Php
    require_once("C:\Sreeji\SwapDeal.in\php\lib\swapdealdb.class.php");
    require_once("C:\Sreeji\SwapDeal.in\php\lib\class.phpmailer.php");
    ini_set("log_errors", 1);
    ini_set("error_log", "C:\\Sreeji\\SwapDeal.in\\log\\error.log");
    
    error_log("SwapInserUser Classs");
    //echo $_GET['username'];
    if(isset($_GET['name']))
    {
    
        $insertuser = array(
            'id' => 0,
            'name' => $_GET['name'],
            'username' => $_GET['username'],
            'password' => $_GET['password'],
            'mobile' => $_GET['mobile'],
            'email' => $_GET['email']
         );
         createUser($insertuser, TRUE);
    }     
    
    
function createUser($insertuser, $internal){
    
    
    
    $usernameExist = check_username($insertuser['username']);     
    //echo "user:".$usernameExist;
    error_log("userid:".$usernameExist);
    if($usernameExist == NULL){
        $relatimeArray = fetch_swapinsertuser($insertuser);
        error_log("userid:". $relatimeArray);
        if($relatimeArray == 1){
            echo "<p>Failure</p>";
            die;
        }else {
            if($internal == FALSE){
                error_log("new user id :".$relatimeArray);
                return $relatimeArray.",New";
            }else{
                echo "<p>You have become a registed users with Swap Deal, mail send with details.</p>";    
            }
            
            
           sendSwapMail($insertuser);
            
        }
    }else{
        
        if($internal == FALSE){
            return $usernameExist.",Existing";
        }else {
            echo "<p>Username already exist, please select a different</p>";
            die;
        }
    }    
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
            $realtimeData = DB::insertId();
            error_log("userid:".$realtimeData);  
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
        // get Joe's password and print it out 

        
        //print_r(DB::query("SELECT * FROM swapdeal.swapuser WHERE username=%s AND password=%s", "swapadmin", "admin"));
        
        $id = DB::queryOneField("id", "SELECT * FROM swapuser WHERE username=%s" , $username);
        
        return $id;
    }
    
    function sendSwapMail($insertuser){
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
        $subject = "Joining mail from swapdeal";
        $body = "Your welcome to sWAPdeal.in, where you can buy/sell for free";
        $to = $insertuser['username'];
        $mail->SetFrom($from, $from_name);
        $mail->Subject = $subject;
        //$mail->Body = buildSwapBody($insertuser);
        $mail->MsgHTML(buildSwapBody($insertuser));
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
    
    function buildSwapBody($insertuser){
            $message = '<html><body>';
			$message .= 'SwapDeal.in';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($insertuser['name']) . "</td></tr>";
			$message .= "<tr><td><strong>username:</strong> </td><td>" . strip_tags($insertuser['username']) . "</td></tr>";
            $message .= "<tr><td><strong>mobile:</strong> </td><td>" . strip_tags($insertuser['mobile']) . "</td></tr>";
			$message .= "<tr><td><strong>password:</strong> </td><td>" . strip_tags($insertuser['password']) . "</td></tr>";
			
			$message .= "</table>";
			$message .= "</body></html>";
            return $message;
    }
?>