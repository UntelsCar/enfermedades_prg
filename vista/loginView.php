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
							<div class="relative">
								<input id="password" name="loginPassword" type="password" placeholder="Contraseña" class="w-full px-4 py-2 border border-green-300 rounded-md focus:ring-2 focus:ring-green-400 outline-none pr-10" />
								<button type="button" onclick="togglePassword()" class="absolute right-2 top-2.5 text-gray-600 hover:text-green-700">
									<svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
									</svg>
								</button>
							</div>
						</div>

						<div>
							<input type="submit" name="b_ingresar" value="Iniciar Sesión" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 font-semibold cursor-pointer transition" />
						</div>
					</form>
				</div>

			</div>

			<script>
				function togglePassword() {
					const passwordInput = document.getElementById('password');
					const eyeIcon = document.getElementById('eyeIcon');
					const isHidden = passwordInput.type === 'password';
					passwordInput.type = isHidden ? 'text' : 'password';
					eyeIcon.innerHTML = isHidden
						? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.057 10.057 0 012.873-4.357M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18" />`
						: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
						   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />`;
				}
			</script>
		</body>
		</html>

<?php
	}
}
?>
