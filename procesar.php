<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" || !empty($_POST)) {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $mensaje = $_POST["mensaje"];

    echo "<h2>pedido recibido caserito</h2>";
    echo "<p>nombre: $nombre</p>";
    echo "<p>correo: $correo</p>";
    echo "<p>mensaje: $mensaje</p>";
    
} else {
    echo "Por favor envia el formulario desde la pagina principal.";
}
