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
        $sintomasProlog = [];
        foreach ($pares as $p) {
            list($id, $resp) = explode(";", $p);
            if (strtolower($resp) === 's') {
                $sintomasProlog[] = "s$id";
            }
        }

        $sintomasStr = implode(",", $sintomasProlog);
        $rutaPl = __DIR__ . "/seic.pl";
        $cmd = "swipl -s " . escapeshellarg($rutaPl) . " -g \"test([$sintomasStr]), diagnostico(D), write(D), nl.\" -t halt.";
        $resultado = shell_exec($cmd);
        return $resultado;
    }

    public function guardarDiagnostico($idpaciente, $pares, $resultado)
    {
        $sql = "INSERT INTO atencion(idpaciente, fechahora, resultado)
                VALUES ($idpaciente, CURRENT_TIMESTAMP(), '$resultado')";
        mysqli_query($this->conn, $sql);
        $idatencion = mysqli_insert_id($this->conn);

        foreach ($pares as $par) {
            if (strlen($par) > 1) {
                $partes = explode(";", $par);
                if (count($partes) === 2) {
                    list($idsintoma, $r) = $partes;
                    $sql = "INSERT INTO atencion_sintoma(idatencion, idsintoma, respuesta)
                            VALUES ($idatencion, $idsintoma, '$r')";
                    if (!mysqli_query($this->conn, $sql)) {
                        die("Error al insertar en atencion_sintoma:<br>" . mysqli_error($this->conn) . "<br>SQL: $sql");
                    }
                }
            }
        }
    }

    public function listarEvaluacionesPorPaciente($idpaciente)
    {
        $sql = "SELECT idatencion, resultado, fechahora FROM atencion WHERE idpaciente = $idpaciente ORDER BY idatencion DESC";
        $resultado = mysqli_query($this->conn, $sql);
        $datos = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function obtenerSintomasPorEvaluacion($idatencion)
    {
        $sql = "SELECT s.sintoma, UPPER(as_.respuesta) AS respuesta 
                FROM atencion_sintoma as_
                JOIN sintoma s ON as_.idsintoma = s.idsintoma
                WHERE as_.idatencion = $idatencion";
        $resultado = mysqli_query($this->conn, $sql);
        $datos = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $fila['respuesta'] = ($fila['respuesta'] === 'S') ? 'Sí' : 'No';
            $datos[] = $fila;
        }
        return $datos;
    }
}
?>
