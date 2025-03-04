<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>



<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary bg-opacity-10 py-3">
                        <h2 class="h5 mb-0 text-primary">Listado de Equipos</h2>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-primary bg-opacity-10">
                                    <tr>
                                        <th class="text-nowrap ps-4">Fecha creación</th>
                                        <th>Descripción</th>
                                        <th>Estado del equipo</th>
                                        <th>Integrantes</th>
                                        <th>Proyecto</th>
                                        <th class="text-center pe-4">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conexion = mysqli_connect("localhost", "root", "", "gestor_proyectos") or die("Error de conexión");
                                    $consulta = "SELECT * FROM equipos";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($row = mysqli_fetch_row($resultado)) {
                                        echo '<tr>';
                                        echo '<td class="ps-4">' . $row[1] . '</td>';
                                        echo '<td>' . $row[2] . '</td>';
                                        echo '<td><span class="badge bg-success bg-opacity-25 text-success">' . $row[3] . '</span></td>';
                                        echo '<td>' . $row[4] . '</td>';
                                        echo '<td>' . $row[5] . '</td>';
                                        echo '<td class="text-center pe-4">';

                                        // Botón Editar
                                        echo '<a href="editar.php?id=' . $row[0] . '" class="btn btn-sm btn-outline-warning me-2">';
                                        echo '<i class="bi bi-pencil"></i>';
                                        echo '</a>';

                                        // Botón Eliminar
                                        echo '<form method="POST" action="eliminar.php" class="d-inline">';
                                        echo '<input type="hidden" name="id" value="' . $row[0] . '">';
                                        echo '<button type="submit" class="btn btn-sm btn-outline-danger" 
                                               onclick="return confirm(\'¿Eliminar este equipo?\')">';
                                        echo '<i class="bi bi-trash"></i></button>';
                                        echo '</form>';

                                        echo '</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent py-3">
                        <div class="d-flex justify-content-end">
                            <a href="agregar_e.php" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>Agregar equipo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>