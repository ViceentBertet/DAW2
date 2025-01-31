<?php
    include("header.php");
    include("emails.php");
?>
    <main class="formulari">
<?php
    if (!isset($_POST["email"]) && !isset($_POST["hora"]) && !isset($_POST["dia_cita"])) {
?>
        <div>
            <h3>Pedir cita</h3>
            <form method="POST" action="emails.php">
                <input type="email" name="email" placeholder="Introduce tu email">
                <div>
                    Hora:
                    <input type="number" name="hora" max="18" min="9">
                    Día:
                    <select name="dia_cita">
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                    </select>
                </div>
                <button>Solicitar cita</button>
            </form>
        </div>
<?php
    } else {
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
                <p>No se ha podido registrar la cita</p>
            </div>
<?php
        }
    }
?>
    </main>
<?php
    include("footer.php");
?>