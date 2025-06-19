<?php
include_once(__DIR__ . "/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idpaciente'];

    $conexion = new Conexion();
    $conn = $conexion->conectarbd();

    $sql = "DELETE FROM paciente WHERE idpaciente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
