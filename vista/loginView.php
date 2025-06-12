<?php
class Login
{
	public function LoginView()
	{
?>
		<!DOCTYPE html>
		<html lang="es">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Sistema Experto</title>
			<script src="https://cdn.tailwindcss.com"></script>
		</head>

		<body class="bg-gradient-to-r from-green-100 to-green-200 min-h-screen flex items-center justify-center font-sans">
			<div class="bg-white rounded-3xl shadow-lg flex flex-col md:flex-row overflow-hidden w-[90%] md:w-[80%] lg:w-[65%]">

				<!-- Lado izquierdo con ilustración -->
				<div class="md:w-1/2 p-8 bg-gradient-to-b from-green-600 to-green-500 flex items-center justify-center">
					<img src="./assets/logo.png" alt="Login Ilustración" class="w-[80%] max-w-xs">
				</div>

				<!-- Lado derecho con formulario -->
				<div class="md:w-1/2 p-8">
					<h2 class="text-2xl font-bold text-green-700 text-center mb-6">Inicio de Sesión</h2>

					<form method="post" action="/enfermedades_prg/controlador/loginController.php" class="space-y-4">
						<div>
							<label class="block text-gray-700 text-sm font-medium mb-1">Usuario</label>
							<input name="loginUser" type="text" placeholder="Usuario" class="w-full px-4 py-2 border border-green-300 rounded-md focus:ring-2 focus:ring-green-400 outline-none" />
						</div>

						<div>
							<label class="block text-gray-700 text-sm font-medium mb-1">Contraseña</label>
							<input name="loginPassword" type="password" placeholder="Contraseña" class="w-full px-4 py-2 border border-green-300 rounded-md focus:ring-2 focus:ring-green-400 outline-none" />
						</div>

						<div>
							<input type="submit" name="b_ingresar" value="Iniciar Sesión" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 font-semibold cursor-pointer transition" />
						</div>
					</form>
				</div>

			</div>
		</body>
		</html>

<?php
	}
}
?>