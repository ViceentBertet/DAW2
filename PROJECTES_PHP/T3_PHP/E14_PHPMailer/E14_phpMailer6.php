<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../vendor/autoload.php";

$config = include 'encripta_devuelve_ALU.php';
$decrypted_password = base64_decode($config['EMAIL_PASSWORD']);

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 2; //Muestra mensajes de depuración
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;

$mail->Username = 'perellobertetjosepvicent@gmail.com'; // Correo
$mail->Password = $decrypted_password; // Contraseña

$mail->setFrom('perellobertetjosepvicent@gmail.com', 'Test');
$mail->Subject = "Prueba de email";

$mail->msgHTML("mensaje");

$mail->addAddress("perellobertetjosepvicent@gmail.com", 'Test');

$mail->Timeout = 60; // Tiempo en segundos

$result = $mail->send();

if (!$result) {
echo "ERROR EN EL ENVIO: <br>" . $mail->ErrorInfo;
} else {
echo 'Correo enviado correctamente';
}
?>