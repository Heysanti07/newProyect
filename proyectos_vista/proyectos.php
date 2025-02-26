<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4 text-center text-primary">Listado de Proyectos</h2>
                <table class="table table-bordered table-striped table-hover table-info">
                    <tr class="bg-primary text-white">
                    <th>Nombre del proyecto</th>    
                    <th>Nombre del Proyectos</th>
                        <th>Objetivos</th>
                        <th>Descripcion</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                    </tr>
                    <?php

                    ?>
                </table>
                <br>
                <form action="create Proyectos.php">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <button id="guardar" name="guardar" type="submit" class="btn btn-primary">Agregar proyecto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>