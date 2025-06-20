<?php

class mensajeSistema{
    public function mensajeError(){ ?>
<!-- Modal de Error -->
	<!DOCTYPE html>
		<html lang="es">

		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>JBC Textil</title>
			<link rel="icon" type="image/png" href="../../images/JBCTEXTIL.png">
			<script src="https://cdn.tailwindcss.com"></script>
		</head>

		<body class="bg-gray-950 select-none min-h-screen flex flex-col">

			<div class="flex-grow">
				<div class="flex flex-col items-center justify-center py-10 px-2">
					<div class="max-w-sm w-full">
						<section class="flex items-center h-full bg-gray-950">
							<div class="container flex flex-col items-center justify-center px-2 my-4 space-y-8 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-auto h-40">
									<path fill="#ffff00" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
								</svg><i class="fa-solid fa-circle-xmark" style="color: #fcd34d;"></i>
								<p class="text-2xl text-white">Contraseña incorrecta</p>
								<form action="/enfermedades_prg" method="post">
									<button type="submit" name="btnRegresar" class="px-8 py-2 font-bold rounded bg-yellow-300">Regresar</button>
								</form>
							</div>
						</section>
					</div>
				</div>
			</div>
		</body>

		</html>
<?php
}   
    }
?>