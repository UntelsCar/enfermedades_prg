<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $actual = $_POST['nombre_actual'] ?? '';
    $nuevo = $_POST['nuevo_nombre'] ?? '';

    if (!$actual || !$nuevo) {
        die("Datos incompletos");
    }

    $archivo = __DIR__ . "/../../modelo/seic.pl";
    $contenido = file_get_contents($archivo);

    $regex = "/enfermedad\('" . preg_quote($actual, '/') . "'\)(.*?)\./";
    $nuevoContenido = preg_replace($regex, "enfermedad('" . $nuevo . "')$1.", $contenido);

    file_put_contents($archivo, $nuevoContenido);
    header("Location: listarEnfermedadesController.php");
    exit;
}
?>
