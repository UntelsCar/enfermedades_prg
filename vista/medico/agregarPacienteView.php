<?php
include_once(__DIR__ . "../../compartidos/apartadosViews.php");
class agregarPacienteView extends apartadosViews
{
	public function agregarPaciente()
	{
		?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<meta charset="UTF-8" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>
				Agregar Paciente
			</title>
			<script src="https://cdn.tailwindcss.com"></script>
		</head>

		<body>
			<div class="flex h-screen overflow-hidden">
				<?php $this->formSideBarShow(); ?>
				<div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
					<!-- ===== Main  ===== -->
					<main class="h-full bg-green-100 select-none">
						<div class="flex items-center justify-center h-full">
							<div class="bg-white p-6 rounded shadow-md max-w-md w-full">
								<h1 class="text-2xl font-semibold mb-6 text-center">Agregar Paciente</h1>
								<form action="../../controlador/medico/agregarPacienteController.php" method="POST">
									<div class="mb-4">
										<label for="nombres" class="block text-gray-700 font-medium mb-2">Nombres</label>
										<input type="text" id="nombres" name="nombres" required
											class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400" />
									</div>
									<div class="mb-4">
										<label for="apellidos" class="block text-gray-700 font-medium mb-2">Apellidos</label>
										<input type="text" id="apellidos" name="apellidos" required
											class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400" />
									</div>
									<div class="mb-6">
										<label for="dni" class="block text-gray-700 font-medium mb-2">DNI</label>
										<input type="text" id="dni" name="dni" maxlength="8" pattern="\d{8}" required
											class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400" />
									</div>
									<div class="flex justify-end">
										<button type="submit" name="b_agregarPaciente"
											class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded transition">
											Guardar
										</button>
									</div>
								</form>
							</div>
						</div>
					</main>
					<!-- ===== Main ===== -->
				</div>
			</div>
			<div id="modalExito" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
				<div class="bg-white rounded-lg shadow-lg p-6 max-w-sm text-center">
					<h2 class="text-xl font-semibold mb-4">✅ Registro exitoso</h2>
					<p class="mb-4">El paciente ha sido registrado correctamente.</p>
					<button onclick="cerrarModal()"
						class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
						Cerrar
					</button>
				</div>
			</div>

			<?php if (isset($_GET['exito']) && $_GET['exito'] == 1): ?>
				<script>
					window.addEventListener('DOMContentLoaded', () => {
						document.getElementById('modalExito').classList.remove('hidden');
					});
				</script>
			<?php endif; ?>
			<script>
				function cerrarModal() {
					document.getElementById('modalExito').classList.add('hidden');
					const url = new URL(window.location);
					url.searchParams.delete('exito');
					window.history.replaceState({}, document.title, url.pathname);
				}
			</script>
		</body>

		</html>
		<?php
	}
}
?>