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
        //Ver los pares que se envian
        //echo "<pre>";
        //var_dump($pares);
        //echo "</pre>";
        //die("Debug stop: Revisa los pares recibidos.");

        // Insertar en la tabla atencion
        $sql = "INSERT INTO atencion(idpaciente, fechahora, resultado)
            VALUES ($idpaciente, (SELECT CURRENT_TIMESTAMP()), '$resultado')";
        mysqli_query($this->conn, $sql);

        // Obtener el idatencion recién insertado
        $idatencion = mysqli_insert_id($this->conn);

        // Insertar cada síntoma relacionado
        foreach ($pares as $par) {
            if (strlen($par) > 1) {
                $partes = explode(";", $par);
                if (count($partes) === 2) {
                    list($idsintoma, $r) = $partes;

                    $sql = "INSERT INTO atencion_sintoma(idatencion, idsintoma, respuesta)
                    VALUES ($idatencion, $idsintoma, '$r')";

                    if (!mysqli_query($this->conn, $sql)) {
                        // Mostramos el error exacto
                        die("Error al insertar en atencion_sintoma:<br>" . mysqli_error($this->conn) . "<br>SQL: $sql");
                    }
                }
            }
        }
    }

    // Devuelve lista de evaluaciones
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