<?php
include_once(__DIR__ . "/../compartidos/apartadosViews.php");

class listarPacientesView extends apartadosViews
{
    public function mostrarVista()
    {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Pacientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex h-screen overflow-hidden">
    <?php $this->formSideBarShow(); ?>
    <div class="flex-1 p-6 bg-green-100">
        <h1 class="text-2xl font-bold mb-4">Pacientes Registrados</h1>
        <input type="text" id="busqueda" placeholder="Buscar por nombre, apellido o DNI"
               class="mb-4 px-4 py-2 border border-gray-300 rounded w-full" />

        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Nombres</th>
                    <th class="p-2">Apellidos</th>
                    <th class="p-2">DNI</th>
                    <th class="p-2">Fecha Registro</th>
                    <th class="p-2">Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-pacientes" class="text-center text-sm"></tbody>
        </table>
    </div>
</div>

<!-- Modal para editar paciente -->
<div id="modalEditar" class="fixed inset-0 hidden bg-black bg-opacity-40 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Editar Paciente</h2>
        <form id="formEditar">
            <input type="hidden" name="idpaciente" id="edit_idpaciente">
            <label class="block mb-2">Nombres</label>
            <input type="text" id="edit_nombres" name="nombres" class="w-full mb-2 p-2 border rounded">
            <label class="block mb-2">Apellidos</label>
            <input type="text" id="edit_apellidos" name="apellidos" class="w-full mb-2 p-2 border rounded">
            <label class="block mb-2">DNI</label>
            <input type="text" id="edit_dni" name="dni" class="w-full mb-4 p-2 border rounded">
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="cerrarModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
function cargarPacientes() {
    const busqueda = document.getElementById('busqueda').value;
    fetch(`../../controlador/medico/listarPacientesController.php?busqueda=${encodeURIComponent(busqueda)}`)
        .then(res => res.json())
        .then(data => {
            const tabla = document.getElementById('tabla-pacientes');
            tabla.innerHTML = '';
            data.forEach(p => {
                tabla.innerHTML += `
                    <tr class="border-b">
                        <td class="p-2">${p.idpaciente}</td>
                        <td class="p-2">${p.nombres}</td>
                        <td class="p-2">${p.apellidos}</td>
                        <td class="p-2">${p.dni}</td>
                        <td class="p-2">${p.fechahora}</td>
                        <td class="p-2 space-x-2">
                            <button onclick="abrirModal(${p.idpaciente}, '${p.nombres}', '${p.apellidos}', '${p.dni}')" class="text-yellow-600 hover:underline">✏️</button>
                            <button onclick="eliminarPaciente(${p.idpaciente})" class="text-red-600 hover:underline">🗑️</button>
                        </td>
                    </tr>`;
            });
        });
}

function abrirModal(id, nombres, apellidos, dni) {
    document.getElementById('edit_idpaciente').value = id;
    document.getElementById('edit_nombres').value = nombres;
    document.getElementById('edit_apellidos').value = apellidos;
    document.getElementById('edit_dni').value = dni;
    document.getElementById('modalEditar').classList.remove('hidden');
}

function cerrarModal() {
    document.getElementById('modalEditar').classList.add('hidden');
}

document.getElementById('formEditar').addEventListener('submit', function(e) {
    e.preventDefault();
    const datos = new FormData(this);
    fetch('../../modelo/pacienteEditarModel.php', {
        method: 'POST',
        body: datos
    })
    .then(res => res.text())
    .then(res => {
        console.log("Respuesta:", res); // <--- Aquí verás en consola la respuesta del backend
        if (res.trim() === "OK") {
            alert('Paciente actualizado');
            cerrarModal();
            cargarPacientes();
        } else {
            alert("Error: " + res);
        }
    })
    .catch(err => {
        console.error("Error al enviar solicitud:", err);
        alert("Error de red o servidor.");
    });
});


function eliminarPaciente(id) {
    if (confirm("¿Deseas eliminar este paciente?")) {
        fetch('../../modelo/pacienteEliminarModel.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `idpaciente=${id}`
        }).then(res => res.text()).then(res => {
            alert('Paciente eliminado');
            cargarPacientes();
        });
    }
}

document.getElementById('busqueda').addEventListener('input', cargarPacientes);
window.onload = cargarPacientes;
</script>
</body>
</html>
<?php
    }
}
$vista = new listarPacientesView();
$vista->mostrarVista();
?>
