<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "./vendor/autoload.php";
    // PONER TU CORREO Y IR A CONSTANTES.PHP Y PONER TU CONTRASEÑA
    // PARA EL CORRECTO FUNCIONAMIENTO DE enviarCorreo();
    define("CORREO_EMPRESA","perellobertetjosepvicent@gmail.com");
    function enviarCorreo($nomRemit, $asunto, $msj, $destino, $nomDest) {
        $const = include('constantes.php');
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
    
        $mail->Username = CORREO_EMPRESA;
        $mail->Password = $const['EMAIL_PASSWORD'];
    
        $mail->setFrom(CORREO_EMPRESA, $nomRemit);
        $mail->Subject = $asunto;
    
        $mail->msgHTML($msj);
    
        $mail->addAddress($destino, $nomDest);
        $mail->Timeout = 60;
        
        $res = $mail->send();
        return $res;
    }

?>