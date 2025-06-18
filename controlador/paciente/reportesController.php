<?php
if (isset($_POST['b_reportes']) ) {
    include_once(__DIR__ . "/../../modelo/atencionModel.php");
    $enfermedadesCount = new atencionModel;
    $enfermedadesCant = $enfermedadesCount -> getVecesEnfermedad($_SESSION['param_idpaciente']);


    include_once(__DIR__ . "/../../vista/paciente/reportesView.php");
    $pacienteView = new reportesView();
    $pacienteView->reportes($enfermedadesCant);
}
?>