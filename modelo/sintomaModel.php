<?php
include_once(__DIR__ . "/conexion.php");

class sintomaModel
{
    private $conn;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->conn = $conexion->conectarbd();
    }

    public function listarSintomas($busqueda = '')
    {
        $sql = "SELECT idsintoma, sintoma FROM sintoma WHERE sintoma LIKE ? ORDER BY idsintoma DESC";
        $like = "%$busqueda%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $like);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $datos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function editarSintoma($idsintoma, $sintoma)
    {
        $sql = "UPDATE sintoma SET sintoma = ? WHERE idsintoma = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $sintoma, $idsintoma);
        return $stmt->execute();
    }

    public function eliminarSintoma($idsintoma)
    {
        $sql = "DELETE FROM sintoma WHERE idsintoma = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idsintoma);
        return $stmt->execute();
    }
}
?>
