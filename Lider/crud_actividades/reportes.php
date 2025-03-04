<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Reportes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary" onclick="openCreateModal()">Crear actividad nueva</button>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar actividad" name="search"
                    value="<?php echo htmlspecialchars($search); ?>">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Actividad</th>
                    <th>Tipo de Actividad</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Horas Utilizadas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['actividad']); ?></td>
                    <td><?php echo htmlspecialchars($row['tipo_actividad']); ?></td>
                    <td><?php echo htmlspecialchars($row['fecha_inicio']); ?></td>
                    <td><?php echo htmlspecialchars($row['fecha_fin']); ?></td>
                    <td><?php echo htmlspecialchars($row['horas_utilizadas']); ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm"
                            onclick="openEditModal(<?php echo htmlspecialchars(json_encode($row)); ?>)">Editar</button>
                        <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Seguro que deseas eliminar esta actividad?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para editar actividad -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Actividad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="editar.php">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="mb-3">
                            <label class="form-label">Actividad</label>
                            <input type="text" class="form-control" name="actividad" id="edit-actividad" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo de Actividad</label>
                            <input type="text" class="form-control" name="tipo_actividad" id="edit-tipo" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha Inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="edit-inicio" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha Fin</label>
                            <input type="date" class="form-control" name="fecha_fin" id="edit-fin" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Horas Utilizadas</label>
                            <input type="number" class="form-control" name="horas_utilizadas" id="edit-horas" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico Gantt -->
    <div class="container mt-4">
        <h3>Diagrama de Gantt</h3>
        <div id="gantt_chart" style="width: 100%; height: 500px;"></div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
    google.charts.load("current", {
        packages: ["gantt"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        fetch('data.php')
            .then(response => response.json())
            .then(data => {
                var chartData = new google.visualization.DataTable();
                chartData.addColumn('string', 'ID');
                chartData.addColumn('string', 'Actividad');
                chartData.addColumn('date', 'Fecha de Inicio');
                chartData.addColumn('date', 'Fecha de Fin');
                chartData.addColumn('number', 'Duración');
                chartData.addColumn('number', 'Porcentaje Completado');
                chartData.addColumn('string', 'Dependencias');

                // Itera sobre los datos recibidos y agrega las filas al DataTable
                data.forEach(item => {
                    let startDate = new Date(item
                        .fecha_inicio); // Convierte la fecha de inicio a un objeto Date
                    let endDate = new Date(item.fecha_fin); // Convierte la fecha de fin a un objeto Date
                    let duration = (endDate - startDate) / (1000 * 60 * 60 *
                        24); // Calcula la duración en días

                    // Añadir la fila al DataTable
                    chartData.addRow([
                        item.id.toString(),
                        item.actividad,
                        startDate,
                        endDate,
                        duration,
                        0, // Porcentaje completado
                        null // Dependencias (si las tienes, puedes agregarlas aquí)
                    ]);
                });

                // Opciones del gráfico
                var options = {
                    height: 500
                };

                // Crear el gráfico
                var chart = new google.visualization.Gantt(document.getElementById("gantt_chart"));
                chart.draw(chartData, options);
            })
            .catch(error => console.error('Error al obtener los datos:', error));
    }


    function openEditModal(data) {
        document.getElementById('edit-id').value = data.id;
        document.getElementById('edit-actividad').value = data.actividad;
        document.getElementById('edit-tipo').value = data.tipo_actividad;
        document.getElementById('edit-inicio').value = data.fecha_inicio;
        document.getElementById('edit-fin').value = data.fecha_fin;
        document.getElementById('edit-horas').value = data.horas_utilizadas;

        var editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$stmt->close();
$conn->close();
?>