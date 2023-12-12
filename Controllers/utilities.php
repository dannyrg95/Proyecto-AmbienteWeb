<?php
    use phpMailer\phpMailer\PHPMailer;
    use phpMailer\phpMailer\SMTP;
    

    function sendEmail($emailAddress, $subject, $message) {
        require PHP_MAILER_PATH . "/src/PHPMailer.php";
        require PHP_MAILER_PATH . "/src/SMTP.php";
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = "joel33960@gmail.com";
        $mail->Password = "eaozcpdljvyxyidr";

        $mail->SetFrom("");
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($emailAddress);
        
        
        $mail->send();
    }
?>