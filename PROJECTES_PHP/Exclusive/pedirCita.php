<?php
    include("header.php");
?>
    <main class="formulari">
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
    </main>
<?php
    include("footer.php");
?>