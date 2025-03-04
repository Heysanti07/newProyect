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
                <h2 class="mb-4 text-center text-primary">Listado de Equipos</h2>
                <table class="table table-bordered table-striped table-hover table-info">
                    <tr class="bg-primary text-white">
                        <th>fecha de creación</th>
                        <th>descripción</th>
                        <th>Estado del equipo</th>
                        <th>Integrantes</th>
                        <th>Proyecto</th>
                    </tr>
                    <?php
                    $conexion = mysqli_connect("localhost","root","","gestor_proyectos") or die ("Error de conexion de BD");
                    $consulta = "SELECT * FROM equipos";
                    $resultado = mysqli_query($conexion,$consulta);
                    while($row = mysqli_fetch_row($resultado)){
                        echo "<tr><td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                        echo "<td>".$row[3]."</td>";
                        echo "<td>".$row[4]."</td>";
                        echo "<td>".$row[5]."</td>";  
                    }
                    ?>
                </table>
                <br>
                <form action="agregar_e.php">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <button id="guardar" name="guardar" type="submit" class="btn btn-primary">Agregar equipo</button>
                        </div>
                    </div>
                </form>
                <form>
                <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <button id="editar" name="borrar" type="submit" class="btn btn-primary">Agregar equipo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>