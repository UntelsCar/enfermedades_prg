
<?php
include_once(__DIR__ ."../../vista/compartidos/apartadosViews.php");
class inicioView extends apartadosViews
{
	public function inicio()
	{
?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<meta charset="UTF-8" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<link rel="icon" type="image/png" href="../images/JBCTEXTIL.png">
			<title>
				Inicio
			</title>
			<script src="https://cdn.tailwindcss.com"></script>
		</head>

		<body>

			<div class="flex h-screen overflow-hidden">
				<?php $this->formSideBarShow(); ?>
				<div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

					<!-- ===== Main  ===== -->
					<main class="h-full bg-green-100 select-none">
						<div class="mx-auto max-w-screen-2xl p-4 h-full text-black">
							Escribe tu vida aqui, igual no lo voy a leer...
						</div>
					</main>
					<!-- ===== Main ===== -->

				</div>
			</div>

		</body>

		</html>
<?php
	}
}
?>