<?php

class reportesController
{
    public function mostrarReportes()
    {
        // Incluir la clase vista
        include_once('../../vista/paciente/reportesView.php');

        // Crear instancia de la vista y mostrarla
        $objForm = new reportesView();
        $objForm->reportes();
    }
}

// Manejar el formulario (cuando se presiona el botón)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'mostrarReportes') {
        $controller = new reportesController();
        $controller->mostrarReportes();
    }
}