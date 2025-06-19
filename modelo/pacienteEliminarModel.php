<?php
include_once(__DIR__ . "/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idpaciente = $_POST['idpaciente'] ?? null;

    if (!$idpaciente) {
        echo "Error: ID no proporcionado.";
        exit;
    }

    $conexion = new Conexion();
    $conn = $conexion->conectarbd();

    // 1. Obtener el ID de usuario vinculado
    $sqlBuscar = "SELECT idusuario FROM paciente WHERE idpaciente = ?";
    $stmtBuscar = $conn->prepare($sqlBuscar);
    $stmtBuscar->bind_param("i", $idpaciente);
    $stmtBuscar->execute();
    $resultado = $stmtBuscar->get_result();
    $fila = $resultado->fetch_assoc();
    $idusuario = $fila['idusuario'] ?? null;
    $stmtBuscar->close();

    if (!$idusuario) {
        echo "Error: No se encontró el usuario asociado.";
        $conn->close();
        exit;
    }

    // 2. Eliminar al paciente
    $sqlEliminarPaciente = "DELETE FROM paciente WHERE idpaciente = ?";
    $stmtPaciente = $conn->prepare($sqlEliminarPaciente);
    $stmtPaciente->bind_param("i", $idpaciente);
    $stmtPaciente->execute();
    $stmtPaciente->close();

    // 3. Eliminar al usuario
    $sqlEliminarUsuario = "DELETE FROM usuario WHERE idusuario = ?";
    $stmtUsuario = $conn->prepare($sqlEliminarUsuario);
    $stmtUsuario->bind_param("i", $idusuario);

    if ($stmtUsuario->execute()) {
        echo "OK";
    } else {
        echo "Error al eliminar usuario: " . $stmtUsuario->error;
    }

    $stmtUsuario->close();
    $conn->close();
}
?>
