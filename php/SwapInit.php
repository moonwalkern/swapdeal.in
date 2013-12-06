<?Php
    require_once("C:\Sreeji\SwapDeal.in\php\lib\swapdealdb.class.php");
    
    echo "Account avaliable => ".check_user("swapadmin","admin");
    
    
    function check_user($username, $passowrd)
    {
        DB::$dbName = "swapdeal";
        DB::$user = "root";
        DB::$password = "admin";
        
        //print_r(DB::query("SELECT * FROM swapdeal.swapuser WHERE username=%s AND password=%s", "swapadmin", "admin"));
        
        $number_user = DB::queryFirstField("SELECT COUNT(*) FROM swapuser WHERE username=%s AND password=%s", $username, $passowrd);
        return $number_user;
    }
    
    
?>