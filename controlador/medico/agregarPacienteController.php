<?php
if (isset($_POST['b_agregarPaciente']) ) {
    //include_once("/enfermedades_prg/vista/medico/agregarPacienteView.php");
    //$pacienteView = new agregarPacienteView();
    //$pacienteView->agregarPaciente();
    include_once(__DIR__ . "/../../vista/medico/agregarPacienteView.php");
        $pacienteView = new agregarPacienteView();
        $pacienteView->agregarPaciente();
}
?>