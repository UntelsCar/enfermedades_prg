<?php 
include_once(__DIR__ . "/../../vista/medico/listarEnfermedadesView.php");
$listarView = new listarEnfermedadesView;

function obtenerEnfermedades() {
    // Ruta al archivo seic.pl
    $rutaProlog = __DIR__ . "/../../modelo/seic.pl";

    if (!file_exists($rutaProlog)){
        die("No se puede localizar el archivo seic.pl, el directorio actual es: " . $rutaProlog);}

    $comando = "swipl -s $rutaProlog -g \"listar_enfermedades(Enfermedades), write(Enfermedades), nl.\" -t halt.";
    // Ejecutar el comando y capturar la salida
    $output = shell_exec($comando);

    // Verifica salida del Prolog
    //echo "<pre>";
    //print_r($output); 
    //echo "</pre>";

    $output = trim($output);
    $output = trim($output, "[]");

    // Convertir en un array de PHP para separar las enfermedades por coma
    $enfermedades = explode(",", $output);
    // Limpieza de posibles espacios adicionales alrededor de cada enfermedad
    $enfermedades = array_map('trim', $enfermedades);

    return $enfermedades;
}

if (isset($_POST['b_listarEnfermedades']) ) {

    $enfermedades = obtenerEnfermedades();

    //print_r($enfermedades);

    include_once(__DIR__ . "/../../modelo/atencionModel.php");
    $enfermedadesCount = new atencionModel;
    $enfermedadesCant = $enfermedadesCount -> getNumPacientesEnfermedad();

    //print_r($enfermedadesCant);

    $enfermedadesList = [];
    
    foreach ($enfermedades as $enfermedad) {
    // Buscar la cantidad de pacientes en el array asociativo, si no existe, asignar 0
    $enfermedadesList[] = [
        'enfermedad' => $enfermedad,
        'cantidad_pacientes' => $enfermedadesCant[$enfermedad] ?? 0 // Asigna 0 si no se encuentra
    ];
    }
    //print_r($enfermedadesList);
    $listarView->listarEnfermedades($enfermedadesList);
 

}