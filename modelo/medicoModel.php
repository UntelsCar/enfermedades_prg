<?php
include_once(__DIR__ . "/conexion.php");

class medicoModel
{
	private $conn;

	public function __construct()
	{
		include_once(__DIR__ . "/conexion.php"); // Asegura la ruta correcta
		$conexion = new Conexion();
		$this->conn = $conexion->conectarbd();
	}
	public function crearUsuarioPaciente($nombres, $apellidos, $dni)
	{
		// Separar nombres y apellidos
		$nombrePartes = explode(" ", trim($nombres));
		$apellidoPartes = explode(" ", trim($apellidos));

		// Obtener primeras 2 letras de los nombres (pueden ser dos nombres o uno solo)
		$letrasNombre = '';
		if (count($nombrePartes) >= 2) {
			$letrasNombre = strtolower(substr($nombrePartes[0], 0, 1) . substr($nombrePartes[1], 0, 1));
		} else {
			$letrasNombre = strtolower(substr($nombrePartes[0], 0, 2));
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
}
?>