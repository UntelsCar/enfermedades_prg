<?php
class evaluacionModel
{
    private $conn;

    public function __construct()
    {
        include_once(__DIR__ . "/conexion.php");
        $conexion = new Conexion();
        $this->conn = $conexion->conectarbd();
    }

    public function getConexion()
    {
        return $this->conn;
    }

    public function obtenerSintomas()
    {
        $sql = "SELECT * FROM sintoma ORDER BY idsintoma";
        $result = mysqli_query($this->conn, $sql);
        $sintomas = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $sintomas[] = $row;
        }
        return $sintomas;
    }

    public function evaluarProlog($pares)
{
    $archivo = __DIR__ . "/seic.pl";
    if (!file_exists($archivo))
        die("No se puede localizar el archivo seic.pl, el directorio actual es: " . __DIR__);

    $X = '[';
    $i = 1;
    foreach ($pares as $par) {
        if (strlen($par) > 1) {
            $partes = explode(";", $par);
            if (count($partes) === 2) {
                list($idsintoma, $r) = $partes;
                if ($r === 's') {
                    $X .= 's' . $i . ',';
                }
            }
        }
        $i++;
    }

    if (substr($X, -1) === ',') {
        $X = substr($X, 0, -1);
    }
    $X .= ']';

    $rutaSeic = escapeshellarg(__DIR__ . '/seic.pl');
    $cmd = "swipl -s $rutaSeic -g \"test($X), diagnostico(E), write(E), nl.\" -t halt.";
    $output = shell_exec($cmd);
    return $output;
}

    public function guardarDiagnostico($idpaciente, $pares, $resultado)
{
    $sql = "INSERT INTO atencion(idpaciente, fechahora, resultado)
            VALUES ($idpaciente, (SELECT CURRENT_TIMESTAMP()), '$resultado')";
    mysqli_query($this->conn, $sql);

    foreach ($pares as $par) {
        if (strlen($par) > 1) {
            $partes = explode(";", $par);
            if (count($partes) === 2) {
                list($idsintoma, $r) = $partes;
                $sql = "INSERT INTO atencion_sintoma(idatencion, idsintoma, respuesta)
                        VALUES ((SELECT MAX(idatencion) FROM atencion), $idsintoma, '$r')";
                mysqli_query($this->conn, $sql);
            }
        }
    }
}
}
?>