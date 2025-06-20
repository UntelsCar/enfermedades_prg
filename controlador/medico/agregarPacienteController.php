<?php
session_start();

include_once(__DIR__ ."/../../modelo/medicoModel.php");
include_once(__DIR__ . "/../../vista/medico/agregarPacienteView.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['b_agregarPaciente']) &&
    !empty($_POST['nombres']) &&
    !empty($_POST['apellidos']) &&
    !empty($_POST['dni']) &&
    preg_match('/^\d{8}$/', $_POST['dni'])
    ){
    // Recibir los datos del formulario
    $nombres = $_POST['nombres'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $dni = $_POST['dni'] ?? '';
    if (!isset($_SESSION['param_idmedico'])) {
        die("No se ha encontrado la sesión del médico. Inicie sesión nuevamente.");
    }
    $idmedico = $_SESSION['param_idmedico']; // Suponiendo que ya lo tienes en sesión

    // Instanciar el modelo
    $modelo = new medicoModel();

    // Crear usuario
    $datosUsuario = $modelo->crearUsuarioPaciente($nombres, $apellidos, $dni);
    $idusuario = $datosUsuario['idusuario'];
    
    // Agregar paciente
    $modelo->agregarPaciente($idmedico, $apellidos, $nombres, $dni, $idusuario);

    // Guardar mensaje de éxito
    header("Location: " . $_SERVER['PHP_SELF'] . "?exito=1");
    exit;
} 

// Mostrar la vista
$pacienteView = new agregarPacienteView();
$pacienteView->agregarPaciente();

?>