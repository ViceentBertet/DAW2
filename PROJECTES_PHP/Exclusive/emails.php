<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "./vendor/autoload.php";
    include("header.php");

    define("CORREO_EMPRESA","perellobertetjosepvicent@gmail.com");
    enviarCita();
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
        $correcto = "";
        for ($i = 0; $i < 2; $i++) {
            $correcto[$i] = enviarCorreo($nomRemit, $asunto, $msj[$i], $destino[$i], $nomDest[$i]);
        }
        if ($correcto[0] && $correcto[1] ) {
?>
        <div class="formulari">
            <p>Se ha registrado correctamente la cita.</p>
            <p>Puede consultar la cita en su correo</p>
            <p><a href="pedirCita.php">Pulsa aquí para volver</a></p>
        </div>
<?php
        } else {
?>
        <div class="formulari">
            <p>No se ha registrar la cita</p>
        </div>
<?php
        } 
    }
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
    include("footer.php");

?>