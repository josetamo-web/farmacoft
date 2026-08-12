<?php
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$consulta = $_POST['consulta'] ?? '';

$servicios = [
    "examen de vista - Bs 50",
    "armazon clasico - Bs 180",
    "lentes de sol - Bs 120"
];

echo "<h1>Cita reservada en optica Mirasol</h1>";

echo "<p>Nombre: $nombre</p>";
echo "<p>Correo: $correo</p>";
echo "<p>Consulta: $consulta</p>";

echo "<h2>Servicios disponibles:</h2>";
echo "<ul>";
foreach ($servicios as $servicio) {
    echo "<li>$servicio</li>";
}
echo "</ul>";

echo "<p>Te atiende jose fernando tamo mejia.</p>";
?>