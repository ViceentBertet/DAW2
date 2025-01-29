<?php
    include("header.php");
?>
<h2>Filtrar por</h2>
<div class="enlaces">
    <div class="bola"><a href="todos.php">Todos</a></div>
    <div onclick="addPrecio()" class="bola" >Precio</div>
    <div onclick="addTipo()" class="bola">Tipo</div>
</div>
<div id="protector" class="ocultar"></div>
<?php
    include("footer.php");
?>