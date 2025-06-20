
<?php
include_once(__DIR__ ."../../compartidos/apartadosViews.php");
class reportesView extends apartadosViews
{
	public function reportes($enfermedadesCant)
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
        	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Incluir Chart.js -->
			<style>
				/* Ajustes para hacer que el gráfico tenga un tamaño adecuado y permita scroll */
				#barChart {
					width: 70% !important; /* Asegura que ocupe todo el ancho disponible */
					height: 400px !important; /* Altura fija para evitar que se expanda demasiado */
					/*max-width: 100%;  Limita el ancho máximo */
				}

				.content-container {
					overflow-y: auto; /* Hacer que la página tenga desplazamiento vertical */
					max-height: 90vh; /* Limitar la altura del contenedor para que pueda hacer scroll */
				}
				.flex-1 {
					overflow-y: auto; /* Habilita el desplazamiento vertical */
					/*max-height: 90vh;  Limita la altura del contenedor para que no se salga de la pantalla */
				}
        	</style>
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
                                <th class="p-3 text-left">Cantidad de veces que he tenido esta enfermedad</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($enfermedadesCant as $enfermedad): ?>
                                <tr class="border-b hover:bg-green-50">
                                    <td class="p-3"><?php echo $enfermedad['enfermedad']; ?></td>
                                    <td class="p-3"><?php echo $enfermedad['cantidad']; ?></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

					<!-- Contenedor para el gráfico -->
                	<div class="mt-6">
                    <canvas id="barChart"></canvas>
                	</div>

                </div>
			</div>
			<script>
				// Preparar los datos para el gráfico
				const labels = <?php echo json_encode(array_column($enfermedadesCant, 'enfermedad')); ?>;
				const data = <?php echo json_encode(array_column($enfermedadesCant, 'cantidad')); ?>;

				// Configuración del gráfico de barras
				const ctx = document.getElementById('barChart').getContext('2d');
				const barChart = new Chart(ctx, {
					type: 'bar', // Tipo de gráfico (barra)
					data: {
						labels: labels, // Enfermedades como etiquetas del eje X
						datasets: [{
							label: 'Cantidad de evaluaciones',
							data: data, // Cantidad de pacientes como valores del eje Y
							backgroundColor: '#4CAF50', // Color de las barras
							borderColor: '#388E3C', // Color de los bordes de las barras
							borderWidth: 1
						}]
					},
					options: {
						responsive: true,
						scales: {
							y: {
								beginAtZero: true // Asegura que el eje Y comience en 0
							}
						}
					}
				});
        	</script>

		</body>

		</html>
<?php
	}
}
?>