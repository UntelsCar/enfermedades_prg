<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_enfermedad'] ?? '';

    if (!$nombre) {
        die("Falta el nombre");
    }

    $archivo = __DIR__ . "/../../modelo/seic.pl";
    $contenido = file_get_contents($archivo);

    // Eliminar la línea que define la enfermedad
    $regex = "/enfermedad\('" . preg_quote($nombre, '/') . "'\)\s*:-\s*.*?\)\s*\.\s*/";
    $nuevoContenido = preg_replace($regex, '', $contenido);

    file_put_contents($archivo, $nuevoContenido);
    header("Location: listarEnfermedadesController.php");
    exit;
}
?>
