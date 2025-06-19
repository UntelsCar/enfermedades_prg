<?php
include_once(__DIR__ . "/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idsintoma = $_POST['idsintoma'] ?? null;
    $sintoma = $_POST['sintoma'] ?? '';

    if (!$idsintoma || empty(trim($sintoma))) {
        echo "Error: Datos inválidos.";
        exit;
    }

    $conexion = new Conexion();
    $conn = $conexion->conectarbd();

    $sql = "UPDATE sintoma SET sintoma = ? WHERE idsintoma = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error en prepare: " . $conn->error;
        exit;
    }

    $stmt->bind_param("si", $sintoma, $idsintoma);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
