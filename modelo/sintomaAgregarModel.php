<?php
include_once(__DIR__ . "/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sintoma = trim($_POST['sintoma'] ?? '');

    if ($sintoma === '') {
        echo "Error: Campo vacío";
        exit;
    }

    $conexion = new Conexion();
    $conn = $conexion->conectarbd();

    $sql = "INSERT INTO sintoma (sintoma) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $sintoma);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
