<?php
if (isset($_POST['b_reportes'])) {
    session_start();
    include_once(__DIR__ . "/../../modelo/atencionModel.php");
    include_once(__DIR__ . "/../../vista/paciente/reportesView.php");

    $modelo = new atencionModel();
    $enfermedadesCant = $modelo->getVecesEnfermedad($_SESSION['param_idpaciente']);

    // 🟩 Obtener lista real de enfermedades desde seic.pl
    $rutaProlog = __DIR__ . "/../../modelo/seic.pl";
    $comando = "swipl -s $rutaProlog -g \"listar_enfermedades(L), write(L), nl.\" -t halt.";
    $salida = shell_exec($comando);
    $salida = trim($salida, "[] \n\r\t");
    $enfermedadesPl = array_map(function($e) {
        return trim($e, "'\" ");
    }, explode(",", $salida));

    // 🟥 Filtrar para mantener solo enfermedades válidas
    $enfermedadesFiltradas = array_filter($enfermedadesCant, function($item) use ($enfermedadesPl) {
        return in_array($item['enfermedad'], $enfermedadesPl);
    });

    $vista = new reportesView();
    $vista->reportes(array_values($enfermedadesFiltradas));
}
?>
