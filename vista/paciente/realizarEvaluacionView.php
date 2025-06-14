<?php
include_once(__DIR__ . "../../compartidos/apartadosViews.php");

class realizarEvaluacionView extends apartadosViews
{
    public function realizarEvaluacion($sintomas)
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" type="image/png" href="../images/JBCTEXTIL.png">
            <title>Evaluación</title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <body>
            <div class="flex h-screen overflow-hidden">
                <?php $this->formSideBarShow(); ?>
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                    <main class="h-full bg-green-100 p-8 text-black">
                        <h1 class="text-2xl font-bold mb-6">Realizar Evaluación</h1>

                        <form id="form-evaluacion">
                            <table class="w-full border-collapse">
                                <tr class="bg-green-300">
                                    <th class="p-2 text-left">Síntoma</th>
                                    <th class="p-2 text-left">¿Lo padece?</th>
                                </tr>
                                <?php foreach ($sintomas as $sintoma) { ?>
                                    <tr class="border-b">
                                        <td class="p-2"><?php echo $sintoma['sintoma']; ?></td>
                                        <td class="p-2">
                                            <select name="respuesta_<?php echo $sintoma['idsintoma']; ?>"
                                                class="border rounded px-2 py-1">
                                                <option value="n">No</option>
                                                <option value="s">Sí</option>
                                            </select>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>

                            <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                Evaluar diagnóstico
                            </button>
                        </form>

                        <!-- Modal -->
                        <div id="resultado-modal"
                            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">

                                <h2 class="text-xl font-semibold mb-4">Resultado del diagnóstico</h2>
                                <div id="resultado-texto" class="whitespace-pre-line text-gray-800"></div>
                                <button onclick="cerrarModal()"
                                    class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                    Cerrar
                                </button>
                            </div>
                        </div>

                    </main>
                </div>
            </div>

            <script>
                document.getElementById('form-evaluacion').addEventListener('submit', function (e) {
                    e.preventDefault();

                    let paramLista = "";
                    const selects = document.querySelectorAll("select[name^='respuesta_']");
                    selects.forEach(select => {
                        const idsintoma = select.name.split("_")[1];
                        const respuesta = select.value;
                        paramLista += idsintoma + ";" + respuesta + "#";
                    });
                    paramLista = paramLista.slice(0, -1);

                    fetch('../../controlador/paciente/realizarEvaluacionController.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams({
                            b_Evaluacion: true,
                            param_lista: paramLista
                        })
                    })
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('resultado-texto').innerText = data;
                            document.getElementById('resultado-modal').classList.remove('hidden');
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });

                function cerrarModal() {
                    // Ocultar el modal
                    document.getElementById('resultado-modal').classList.add('hidden');

                    // Reiniciar todos los selects del formulario a su valor por defecto (primera opción)
                    const selects = document.querySelectorAll("select[name^='respuesta_']");
                    selects.forEach(select => {
                        select.selectedIndex = 0;
                    });
                }
            </script>
        </body>

        </html>
        <?php
    }

}
?>