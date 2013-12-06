<?Php
    require_once("C:\Sreeji\SwapDeal.in\php\lib\swapdealdb.class.php");
    
    //echo "Reached SWAP Ajax Page";
    $searchPage ="<table style='border:1px dashed black;'>".
                 "<tr>".
                 "<th>Table Header1</th><th>Table Header</th>".
                 "</tr>".
                 "<tr>".
                 "<td>Table cell 2</td><td>Table cell 2</td>".
                 "</tr>".
                 "<tr>".
                 "<td>Table cell 4</td><td>Table cell 4</td>".
                 "</tr>".
                 "</table>";
    echo $searchPage;
    
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