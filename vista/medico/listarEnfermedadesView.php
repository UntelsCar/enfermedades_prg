
<?php
include_once(__DIR__ . "../../compartidos/apartadosViews.php");
class listarEnfermedadesView extends apartadosViews
{
	public function listarEnfermedades($enfermedadesList)
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
				<div class="flex-1 p-6 bg-green-100">
                    <h1 class="text-2xl font-bold mb-6">Enfermedades evaluadas</h1>

                    <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="p-3 text-left">Enfermedad</th>
                                <th class="p-3 text-left">Cantidad de pacientes</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($enfermedadesList as $enfermedad): ?>
                                <tr class="border-b hover:bg-green-50">
                                    <td class="p-3"><?php echo $enfermedad['enfermedad']; ?></td>
                                    <td class="p-3"><?php echo $enfermedad['cantidad_pacientes']; ?></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
			</div>

		</body>

		</html>
<?php
	}
}
?>