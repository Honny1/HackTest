<?php
function sendEmail($email){
    date_default_timezone_set('Etc/UTC');

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();

    $mail->Host = 'smtp.seznam.cz';
    $mail->Port = 25;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    
    require 'emailpass.php';

    $mail->setFrom('hacktest97@seznam.cz', 'G0D');
    $mail->addAddress($email);
    $mail->Subject = 'PHPMailer Mail SMTP test';

    $mail->Body = 'password: test';

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
function getUserEmail($user_name){
     include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/connectDatabase.php');
     $sql = "SELECT email FROM user WHERE name = '$user_name'";
     $result = mysqli_query($db,$sql);
     $email= mysqli_fetch_array($result);
     mysqli_close($db);
     return $email['email'];
}
?>
