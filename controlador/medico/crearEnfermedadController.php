<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $sintomas = $_POST['sintomas'] ?? [];

    if (empty($nombre) || empty($sintomas)) {
        die("Error: Datos incompletos");
    }

    $linea = "enfermedad('" . $nombre . "') :- " . implode(", ", array_map(fn($s) => "tiene($s)", $sintomas)) . ".\n";

    $archivo = __DIR__ . "/../../modelo/seic.pl";
    $contenido = file_get_contents($archivo);

    if (str_contains($contenido, $linea)) {
        header("Location: listarEnfermedadesController.php");
        exit;
    }

    $patron = "/(%aquiAgregar)/";
    $nuevoContenido = preg_replace($patron, $linea . "\n$1", $contenido);
    file_put_contents($archivo, $nuevoContenido);

    header("Location: listarEnfermedadesController.php");
    exit;
}
?>
