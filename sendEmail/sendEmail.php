<?php
function sendEmail($email){
    date_default_timezone_set('Etc/UTC');

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();

    $mail->Host = 'smtp.seznam.cz';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    
    require 'emailpass.php';

    $mail->setFrom('hacktest19@purkynka.com', 'Hacktest | Purkiada 2019');
    $mail->addAddress($email);
    $mail->Subject = 'HESLO, o ktere bojujes!';

    $mail->Body = 'password: ThisIsNotAPassword';

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
function getUserEmail($userId){
     include('./controlDatabase/connectDatabase.php');
     $sql = "SELECT email FROM user WHERE iduser = '$userId'";
     $result = mysqli_query($db,$sql);
     $email= mysqli_fetch_array($result);
     mysqli_close($db);
     return $email['email'];
}
?>
