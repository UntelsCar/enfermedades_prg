<?php
include_once(__DIR__ . "/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idpaciente'] ?? null;
    $nombres = $_POST['nombres'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $dni = $_POST['dni'] ?? '';

    if (!$id || !$nombres || !$apellidos || !$dni) {
        echo "Error: Datos incompletos.";
        exit;
    }

    $conexion = new Conexion();
    $conn = $conexion->conectarbd();

    // Obtener ID de usuario asociado
    $sqlBuscar = "SELECT idusuario FROM paciente WHERE idpaciente = ?";
    $stmtBuscar = $conn->prepare($sqlBuscar);
    $stmtBuscar->bind_param("i", $id);
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

    // --- GENERAR NUEVO NOMBRE DE USUARIO ---
    $nombrePartes = explode(" ", trim($nombres));
    $apellidoPartes = explode(" ", trim($apellidos));

    $letrasNombre = (count($nombrePartes) >= 2)
        ? substr($nombrePartes[0], 0, 1) . substr($nombrePartes[1], 0, 1)
        : substr($nombrePartes[0], 0, 2);

    $apellido1 = ucfirst(strtolower($apellidoPartes[0] ?? ''));
    $apellido2 = ucfirst(strtolower($apellidoPartes[1] ?? ''));

    $nuevoUsuario = $letrasNombre . $apellido1 . $apellido2;
    $nuevaClave = password_hash($dni, PASSWORD_DEFAULT);

    // --- ACTUALIZAR TABLA USUARIO ---
    $sqlUpdateUsuario = "UPDATE usuario SET usuario = ?, clave = ? WHERE idusuario = ?";
    $stmtUsuario = $conn->prepare($sqlUpdateUsuario);
    $stmtUsuario->bind_param("ssi", $nuevoUsuario, $nuevaClave, $idusuario);

    if (!$stmtUsuario->execute()) {
        echo "Error al actualizar usuario: " . $stmtUsuario->error;
        $stmtUsuario->close();
        $conn->close();
        exit;
    }
    $stmtUsuario->close();

    // --- ACTUALIZAR TABLA PACIENTE ---
    $sql = "UPDATE paciente SET nombres = ?, apellidos = ?, dni = ? WHERE idpaciente = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error en prepare(): " . $conn->error;
        exit;
    }

    $stmt->bind_param("sssi", $nombres, $apellidos, $dni, $id);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "Error al ejecutar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
