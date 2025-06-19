<?php
include_once(__DIR__ . "/../compartidos/apartadosViews.php");

class listarSintomasView extends apartadosViews
{
    public function mostrarVista()
    {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Síntomas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex h-screen overflow-hidden">
    <?php $this->formSideBarShow(); ?>
    <div class="flex-1 p-6 bg-green-100">
        <h1 class="text-2xl font-bold mb-4">Listado de Síntomas</h1>
        <input type="text" id="busqueda" placeholder="Buscar síntoma..." class="mb-4 px-4 py-2 border rounded w-full" />

        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Síntoma</th>
                    <th class="p-2">Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-sintomas" class="text-center text-sm"></tbody>
        </table>
    </div>
</div>

<!-- Modal editar -->
<div id="modalEditar" class="fixed inset-0 bg-black bg-opacity-40 hidden z-50 justify-center items-center">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md mx-auto">
        <h2 class="text-xl font-bold mb-4">Editar Síntoma</h2>
        <form id="formEditar">
            <input type="hidden" id="edit_idsintoma" name="idsintoma">
            <label>Síntoma</label>
            <input type="text" id="edit_sintoma" name="sintoma" class="w-full p-2 border rounded mb-4" required>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="cerrarModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
function cargarSintomas() {
    const query = document.getElementById('busqueda').value;
    fetch('../../controlador/medico/listarSintomasController.php?busqueda=' + encodeURIComponent(query))

        .then(res => res.json())
        .then(data => {
            const tabla = document.getElementById('tabla-sintomas');
            tabla.innerHTML = '';
            data.forEach(s => {
                tabla.innerHTML += `
                    <tr class="border-b">
                        <td class="p-2">${s.idsintoma}</td>
                        <td class="p-2">${s.sintoma}</td>
                        <td class="p-2 space-x-2">
                            <button onclick="abrirModal(${s.idsintoma}, '${s.sintoma}')" class="text-yellow-600">✏️</button>
                            <button onclick="eliminarSintoma(${s.idsintoma})" class="text-red-600">🗑️</button>
                        </td>
                    </tr>`;
            });
        });
}

function abrirModal(id, sintoma) {
    document.getElementById('edit_idsintoma').value = id;
    document.getElementById('edit_sintoma').value = sintoma;
    document.getElementById('modalEditar').classList.remove('hidden');
}

function cerrarModal() {
    document.getElementById('modalEditar').classList.add('hidden');
}

document.getElementById('formEditar').addEventListener('submit', function(e) {
    e.preventDefault();
    const datos = new FormData(this);
    fetch('../../modelo/sintomaEditarModel.php', {
        method: 'POST',
        body: datos
    }).then(res => res.text()).then(res => {
        if (res.trim() === 'OK') {
            alert('Síntoma actualizado');
            cerrarModal();
            cargarSintomas();
        } else {
            alert("Error: " + res);
        }
    });
});

function eliminarSintoma(id) {
    if (confirm("¿Deseas eliminar este síntoma?")) {
        fetch('../../modelo/sintomaEliminarModel.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'idsintoma=' + id
        }).then(res => res.text()).then(res => {
            if (res.trim() === 'OK') {
                alert('Síntoma eliminado');
                cargarSintomas();
            } else {
                alert("Error: " + res);
            }
        });
    }
}

document.getElementById('busqueda').addEventListener('input', cargarSintomas);
window.onload = cargarSintomas;
</script>
</body>
</html>
<?php
    }
}
$vista = new listarSintomasView();
$vista->mostrarVista();
?>
