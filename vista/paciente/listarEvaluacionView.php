<?php
include_once(__DIR__ . "../../compartidos/apartadosViews.php");

class listarEvaluacionView extends apartadosViews
{
    public function listarEvaluacion($evaluaciones)
    {
?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <script src="https://cdn.tailwindcss.com"></script>
            <title>Mis Evaluaciones</title>
        </head>
        <body>
            <div class="flex h-screen overflow-hidden">
                <?php $this->formSideBarShow(); ?>
                <div class="flex-1 p-6 bg-green-100 overflow-y-auto">
                    <h1 class="text-2xl font-bold mb-6">Mis Evaluaciones</h1>

                    <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="p-3 text-left">ID</th>
                                <th class="p-3 text-left">Resultado</th>
                                <th class="p-3 text-left">Fecha</th>
                                <th class="p-3 text-center">Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evaluaciones as $eva): ?>
                                <tr class="border-b hover:bg-green-50">
                                    <td class="p-3"><?php echo $eva['idatencion']; ?></td>
                                    <td class="p-3"><?php echo $eva['resultado']; ?></td>
                                    <td class="p-3"><?php echo $eva['fechahora']; ?></td>
                                    <td class="p-3 text-center">
                                        <button onclick="verSintomas(<?php echo $eva['idatencion']; ?>)" class="text-green-600 hover:text-green-800">
                                            👁 Ver
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Modal -->
                    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                        <div class="bg-white p-6 rounded shadow-lg w-full max-w-lg">
                            <h2 class="text-xl font-bold mb-4">Síntomas de la Evaluación</h2>
                            <div id="modal-contenido" class="text-gray-800 space-y-2"></div>
                            <button onclick="cerrarModal()" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function verSintomas(id) {
                    fetch(`../../controlador/paciente/listarEvaluacionController.php?action=ver_detalle&idatencion=${id}`)
                        .then(res => res.text())
                        .then(data => {
                            document.getElementById('modal-contenido').innerHTML = data;
                            document.getElementById('modal').classList.remove('hidden');
                        });
                }

                function cerrarModal() {
                    document.getElementById('modal').classList.add('hidden');
                }
            </script>
        </body>
        </html>
<?php
    }

    public function renderizarModalSintomas($sintomas)
    {
        if (empty($sintomas)) return "<p>No hay síntomas registrados.</p>";

        $html = "<ul class='list-disc pl-5'>";
        foreach ($sintomas as $s) {
            $html .= "<li><strong>{$s['sintoma']}:</strong> {$s['respuesta']}</li>";
        }
        $html .= "</ul>";

        return $html;
    }
}