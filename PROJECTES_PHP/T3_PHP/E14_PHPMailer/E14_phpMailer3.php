<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../vendor/autoload.php";

$nom = $_POST['nom'];
$remitente = $_POST['email'];
$asunto = $_POST['asunto'];
$msj = $_POST['msj'];

if (isset($_FILES['fitx']) && $_FILES['fitx']['error'] == UPLOAD_ERR_OK) {
    $fitx_tmp = $_FILES['fitx']['tmp_name'];
    $fitx_nombre = $_FILES['fitx']['name'];
    
    $mail = new PHPMailer();
    
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

    $mail->Username = $remitente; 
    $mail->Password = '';

    $mail->setFrom($remitente , $nom);
    $mail->Subject = $asunto;

    $mail->msgHTML($msj);

    $mail->addAddress('perellobertetjosepvicent@gmail.com', 'Test');
    $mail->addAttachment($fitx_tmp, $fitx_nombre);
    $mail->Timeout = 60;

    $result = $mail->send();

    if (!$result) {
        echo "ERROR EN EL ENVIO: <br>" . $mail->ErrorInfo;
    } else {
        echo 'Correo enviado correctamente';
    }
} else {
    echo "Error al subir archivo";
}
?>
