<?php
include_once(__DIR__ . "/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idsintoma = $_POST['idsintoma'] ?? null;

    if (!$idsintoma) {
        echo "Error: ID inválido.";
        exit;
    }

    $conexion = new Conexion();
    $conn = $conexion->conectarbd();

    $sql = "DELETE FROM sintoma WHERE idsintoma = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error en prepare: " . $conn->error;
        exit;
    }

    $stmt->bind_param("i", $idsintoma);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "Error al eliminar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
