<?Php
    require_once("C:\Sreeji\SwapDeal.in\php\lib\class.phpmailer.php");
    
    
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; 
    $mail->Username = 'moonwalker.n@gmail.com';  
    $mail->Password = 'Audi2700!';
    $from = "moonwalker.n@gmail.com";           
    $from_name = "Sreeji Gopal";
    $subject = "testmail from swapdeal";
    $body = "testmail from swapdeal";
    $to = "sreeji.gopal@gmail.com";
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
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

?>