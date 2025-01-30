<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "../vendor/autoload.php";
    define(CORREO_EMPRESA,"perellobertetjosepvicent@gmail.com");
    function enviarCita() {
        $email = $_POST['email'];
        $hora = $_POST['hora'];
        $diaCita = $_POST['dia_cita'];
        $nomRemit = "Exclusive";
        $asunto = "Cita";
        $msj = [
            "Usted ha registrado una cita para el $diaCita a las $hora horas. ¡Te esperamos!",
            "$email ha registrado una cita para el $diaCita a las $hora horas. ¡Manos a la obra!"
        ];
        $destino = [$email, CORREO_EMPRESA];
        $nomDest = ['Cliente', 'Trabajador'];
        for ($i = 0; $i < count($destino); $i++) {
            enviarCorreo($nomRemit, $asunto, $msj[$i], $destino[$i], $nomDest[$i]);
        }
    }
    function enviarCorreo($nomRemit, $asunto, $msj, $destino, $nomDest) {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
    
        $mail->Username = CORREO_EMPRESA;
        $mail->Password = '';
    
        $mail->setFrom(CORREO_EMPRESA, $nomRemit);
        $mail->Subject = $asunto;
    
        $mail->msgHTML($msj);
    
        $mail->addAddress($destino, $nomDest);
        $mail->Timeout = 60; // Tiempo en segundos
    
        $result = $mail->send();
    
        if (!$result) {
            echo "ERROR EN EL ENVIO: <br>" . $mail->ErrorInfo;
        } else {
            echo 'Correo enviado correctamente';
        }
    }
?>