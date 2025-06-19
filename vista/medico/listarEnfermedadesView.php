<?php
include_once(__DIR__ . "../../compartidos/apartadosViews.php");
class listarEnfermedadesView extends apartadosViews {
    public function listarEnfermedades($enfermedadesList, $sintomas) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Enfermedades</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex h-screen overflow-hidden">
        <?php $this->formSideBarShow(); ?>
        <div class="flex-1 p-6 bg-green-100 overflow-y-auto">
            <h1 class="text-2xl font-bold mb-6">Enfermedades evaluadas</h1>

            <table class="w-full bg-white shadow-md rounded-lg overflow-hidden mb-10">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="p-3 text-left">Enfermedad</th>
                        <th class="p-3 text-left">Cantidad de pacientes</th>
                        <th class="p-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enfermedadesList as $e): ?>
                        <tr class="border-b hover:bg-green-50">
                            <td class="p-3"><?php echo $e['enfermedad']; ?></td>
                            <td class="p-3"><?php echo $e['cantidad_pacientes']; ?></td>
                            <td class="p-3">
                                <form action="../../controlador/medico/editarEnfermedadController.php" method="POST" class="inline">
                                    <input type="hidden" name="nombre_actual" value="<?php echo $e['enfermedad']; ?>">
                                    <input type="text" name="nuevo_nombre" placeholder="Nuevo nombre..." class="border p-1">
                                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 px-2 py-1 text-white rounded">Modificar</button>
                                </form>
                                <form action="../../controlador/medico/eliminarEnfermedadController.php" method="POST" class="inline ml-2">
                                    <input type="hidden" name="nombre_enfermedad" value="<?php echo $e['enfermedad']; ?>">
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 px-2 py-1 text-white rounded">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2 class="text-xl font-semibold mb-4">Agregar nueva enfermedad</h2>
            <form method="POST" action="../../controlador/medico/crearEnfermedadController.php" class="bg-white p-6 rounded shadow">
                <div class="mb-4">
                    <label class="block font-bold mb-1">Nombre de la enfermedad:</label>
                    <input type="text" name="nombre" required class="w-full p-2 border border-gray-300 rounded" placeholder="Ej. Dengue Hemorrágico">
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">Síntomas asociados:</label>
                    <div class="grid grid-cols-2 gap-2">
                        <?php foreach ($sintomas as $s): ?>
                            <label><input type="checkbox" name="sintomas[]" value="s<?php echo $s['idsintoma']; ?>"> <?php echo $s['sintoma']; ?></label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Agregar Enfermedad</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php } } ?>
