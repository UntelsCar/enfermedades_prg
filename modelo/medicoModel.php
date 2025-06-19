<?php
include_once(__DIR__ . "/conexion.php");

class medicoModel
{
	private $conn;

	public function __construct()
	{
		include_once(__DIR__ . "/conexion.php"); // Carga el archivo conexion.php que contiene la clase Conexion.
		$conexion = new Conexion();              // Crea una instancia de la clase Conexion.
		$this->conn = $conexion->conectarbd();   // Llama a conectarbd() y guarda el objeto de conexión en $conn.
	}
	public function crearUsuarioPaciente($nombres, $apellidos, $dni)
	{
		// Separar nombres y apellidos
		$nombrePartes = explode(" ", trim($nombres));
		$apellidoPartes = explode(" ", trim($apellidos));

		// Obtener primeras 2 letras de los nombres (pueden ser dos nombres o uno solo)
		$letrasNombre = '';
		if (count($nombrePartes) >= 2) {
			$letrasNombre = substr($nombrePartes[0], 0, 1) . substr($nombrePartes[1], 0, 1);
		} else {
			$letrasNombre = substr($nombrePartes[0], 0, 2);
		}

		// Obtener los dos apellidos
		$apellido1 = ucfirst(strtolower($apellidoPartes[0] ?? ''));
		$apellido2 = ucfirst(strtolower($apellidoPartes[1] ?? ''));

		// Generar usuario
		$usuario = $letrasNombre . $apellido1 . $apellido2;

		// Encriptar clave (usamos DNI)
		$clave = password_hash($dni, PASSWORD_DEFAULT);

		// Insertar en la base de datos
		$sql = "INSERT INTO usuario(usuario, clave, rol, estado) VALUES (?, ?, 'p', 'a')";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("ss", $usuario, $clave);
		$stmt->execute();

		// Obtener el ID insertado de forma segura
		$idusuario = $stmt->insert_id;

		// Retornar ambos datos
		return [
			'usuario' => $usuario,
			'idusuario' => $idusuario
		];
	}

	public function agregarPaciente($idmedico, $apellidos, $nombres, $dni, $idusuario)
	{
		$sql = "INSERT INTO paciente(idmedico, apellidos, nombres, dni, fechahora, idusuario) 
		        VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP(), ?)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("isssi", $idmedico, $apellidos, $nombres, $dni, $idusuario);
		return $stmt->execute();
	}

	public function listarPacientesPorMedico($idmedico, $busqueda = '')
{
    $sql = "SELECT idpaciente, nombres, apellidos, dni, fechahora 
            FROM paciente 
            WHERE idmedico = ? AND (nombres LIKE ? OR apellidos LIKE ? OR dni LIKE ?)
            ORDER BY idpaciente DESC";

    $like = "%$busqueda%";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("isss", $idmedico, $like, $like, $like);
    $stmt->execute();
    $resultado = $stmt->get_result();

    $pacientes = [];
    while ($fila = $resultado->fetch_assoc()) {
        $pacientes[] = $fila;
    }

    return $pacientes;
}


}
?>