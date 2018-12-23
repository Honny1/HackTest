<?php
function sendEmail($email){
    date_default_timezone_set('Etc/UTC');

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    
    require 'emailpass.php';

    $mail->setFrom('hack69.test69@gmail.com', 'G0D');
    $mail->addAddress($email);
    $mail->Subject = 'PHPMailer GMail SMTP test';

    $mail->Body = 'password: test';

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>
