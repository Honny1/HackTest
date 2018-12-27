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

    $mail->setFrom('hackt9208@gmail.com', 'G0D');
    $mail->addAddress($email);
    $mail->Subject = 'PHPMailer Mail SMTP test';

    $mail->Body = 'password: ThisIsNotAPassword';

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
function getUserEmail($userId){
     include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/connectDatabase.php');
     $sql = "SELECT email FROM user WHERE iduser = '$userId'";
     $result = mysqli_query($db,$sql);
     $email= mysqli_fetch_array($result);
     mysqli_close($db);
     return $email['email'];
}
?>
