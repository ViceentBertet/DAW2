<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../vendor/autoload.php";

$dest = $_POST['email'];
$asunto = $_POST['asunto'];
$msj = $_POST['msj'];

if (!empty($_FILES['fitx']['name'][0])) {
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
    for ($i = 0; $i < count($_FILES['fitx']['name']); $i++) {
        $tmp_name = $_FILES["fitx"]['tmp_name'][$i];
        $name = $_FILES["fitx"]['name'][$i];
        $mail->addAttachment($tmp_name, $name);
    }
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
