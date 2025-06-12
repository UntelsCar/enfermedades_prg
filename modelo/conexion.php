<?php
class Conexion {
    // Método para establecer la conexión
    public function conectarbd() {
        try {
            $this->conn = new mysqli("localhost", "root", "", "emfermedades_db");

            // Verificar si la conexión fue exitosa
            if ($this->conn->connect_error) {
                die("Error de conexión: " . $this->conn->connect_error);
            }
            return $this->conn;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Método para cerrar la conexión
    public function cerrar() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>