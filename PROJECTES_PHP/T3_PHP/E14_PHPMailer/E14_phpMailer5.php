<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "../vendor/autoload.php";
function enviarEmail($dest, $asunto, $msj, $fitx) {
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
    $mail->Subject = $asunto;

    $mail->msgHTML($msj);

    $mail->addAddress($dest, 'Test');
    for ($i = 0; $i < count($fitx['nom']); $i++) {
        $mail->addAttachment($fitx['ruta'][$i], $fitx['nom'][$i]);
    }
    $mail->Timeout = 60;

    $result = $mail->send();

    if (!$result) {
        echo "ERROR EN EL ENVIO: <br>" . $mail->ErrorInfo;
    } else {
        echo 'Correo enviado correctamente';
    }
    
}
$emails = ['perellobertetjosepvicent@gmail.com', 'josperber2@alu.edu.gva.es'];
$fitx = [
        'nom' => ['ajustes.txt', 'ajustes2.txt'],
        'ruta' => [
            'C:\\Users\\vicen\\Documents\\ajustes.txt', 
            'C:\\Users\\vicen\\Documents\\ajustes2.txt'
            ]
    ];
for ($i = 0; $i < count($emails); $i++) {
    enviarEmail($emails[$i],
            "Prueba mensaje difusion", 
            "Mensaje de difusión, no contestar a este mensaje.", 
            $fitx);
}
?>

