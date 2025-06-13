<?php
if (isset($_POST['b_reportes']) ) {
    include_once(__DIR__ . "/../../vista/paciente/reportesView.php");
        $pacienteView = new reportesView();
        $pacienteView->reportes();
}
?>