<?php
include_once(__DIR__ . "/../../vista/medico/listarEnfermedadesView.php");
$listarView = new listarEnfermedadesView;

function obtenerEnfermedades() {
    $rutaProlog = __DIR__ . "/../../modelo/seic.pl";
    if (!file_exists($rutaProlog)) return [];

    $comando = "swipl -s $rutaProlog -g \"listar_enfermedades(L), write(L), nl.\" -t halt.";
    $output = shell_exec($comando);
    $output = trim($output, "[]");

    $enfermedades = array_map(function($e) {
        return trim($e, " '\"\t\n\r\0\x0B]");
    }, explode(",", $output));

    return $enfermedades;
}


function obtenerSintomas() {
    include_once(__DIR__ . "/../../modelo/conexion.php");
    $conexion = new Conexion();
    $conn = $conexion->conectarbd();

    $sql = "SELECT idsintoma, sintoma FROM sintoma ORDER BY idsintoma";
    $result = $conn->query($sql);
    $sintomas = [];

    while ($row = $result->fetch_assoc()) {
        $sintomas[] = $row;
    }

    return $sintomas;
}

include_once(__DIR__ . "/../../modelo/atencionModel.php");
$modelo = new atencionModel;
$conteo = $modelo->getNumPacientesEnfermedad();

$enfermedades = obtenerEnfermedades();
$enfermedadesList = [];

foreach ($enfermedades as $e) {
    $enfermedadesList[] = [
        'enfermedad' => trim($e, "' "),
        'cantidad_pacientes' => $conteo[trim($e, "' ")] ?? 0
    ];
}

$sintomas = obtenerSintomas();
$listarView->listarEnfermedades($enfermedadesList, $sintomas);
?>
