<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "../vendor/autoload.php";
function enviarEmail($dest, $asunto, $msj) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 2; //Muestra mensajes de depuración
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

    $mail->Username = 'perellobertetjosepvicent@gmail.com'; // Correo
    $mail->Password = ''; // Contraseña

    $mail->setFrom('perellobertetjosepvicent@gmail.com', 'Test');
    $mail->Subject = $asunto;

    $mail->msgHTML($msj);

    $mail->addAddress($dest, 'Test');
    if (!empty($fitx)) {$mail->addAttachment($fitx);}
    $mail->Timeout = 60; // Tiempo en segundos

    $result = $mail->send();

    if (!$result) {
    echo "ERROR EN EL ENVIO: <br>" . $mail->ErrorInfo;
    } else {
    echo 'Correo enviado correctamente';
    }

}
$emails = ['perellobertetjosepvicent@gmail.com', 'josperber2@alu.edu.gva.es'];
for ($i = 0; $i < count($emails); $i++) {
    enviarEmail($emails[$i], "Prueba mensaje difusion", "Mensaje de difusión, no contestar a este mensaje.");
}
?>