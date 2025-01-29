<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "../vendor/autoload.php";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

    $mail->Username = 'perellobertetjosepvicent@gmail.com'; 
    $mail->Password = '';

    $mail->setFrom('perellobertetjosepvicent@gmail.com', 'Test');
    $mail->Subject = 'Correo de prueba';

    $mail->msgHTML('Correo enviado con PHPmailer');

    $address = 'perellobertetjosepvicent@gmail.com';
    $mail->addAddress($address, 'Test');
    $mail->Timeout = 60;

    $result = $mail->send();

    if (!$result) {
        echo "ERROR EN EL ENVIO: <br>" . $mail->ErrorInfo;
    } else {
        echo 'Correo enviado correctamente';
    }
?>