<html>
    <head>
        <title>FormNum</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Introducción de dos números</h1>
        <b>Operaciones básicas</b><br><br>
        <?php
            $num1 = $_GET['num1'];
            $num2 = $_GET['num2'];
            $suma = $num1 + $num2;
            $resta = $num1 - $num2;
            $mult = $num1 * $num2;
            $divi = $num1 / $num2;
            $resto = $num1 % $num2;
            $and = $num1 && $num2;
            $or = $num1 || $num2;
            $and2 = $num1 & $num2;
            $or2 = $num1 | $num2;
            $izq = $num1 << $num2;
            $der = $num1 >> $num2;
            
            echo "<h1>Las operaciones aritméticas son: </h1>";
            echo "La suma vale: " . $suma;
            echo "<br>La resta vale: " . $resta;
            echo "<br>La multiplicación vale: " . $mult;
            echo "<br>La división vale: " . $divi;
            echo "<br>El resto de la división vale: " . $resto;

            echo "<h1>Las operaciones LOGICAS son: </h1>";
            echo "AND de los numeros: " . $and;
            echo "<br>OR de los numeros: " . $or;
            echo "<h1>Las operaciones a nivel de BIT son: </h1>";
            echo "AND bit de los numeros: " . $and2;
            echo "<br>OR bit de los numeros: " . $or2;
            echo "<br>Desplazamiento del num $num1===>$num2 posiciones a la izqda $izq";
            echo "<br>Desplazamiento del num $num1===>$num2 posiciones a la drcha $der";
            
           
        ?>
    </body>
</html>
