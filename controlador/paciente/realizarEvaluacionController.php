<?php
if (isset($_POST['b_realizarEvaluacion']) ) {
    include_once(__DIR__ . "/../../vista/paciente/realizarEvaluacionView.php");
        $pacienteView = new realizarEvaluacionView();
        $pacienteView->realizarEvaluacion();
}
?>