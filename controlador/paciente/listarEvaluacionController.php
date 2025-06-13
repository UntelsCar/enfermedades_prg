<?php
if (isset($_POST['b_listarEvaluacion']) ) {
    include_once(__DIR__ . "/../../vista/paciente/listarEvaluacionView.php");
        $pacienteView = new listarEvaluacionView();
        $pacienteView->listarEvaluacion();
}
?>