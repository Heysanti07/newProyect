<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Crear equipo</h2>
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <div class="mb-3">
                                <label for="nombre_p" class="form-label text-primary">Nombre del equipo:</label>
                                <input type="text" name="nombre_p" id="nombre_p" class="form-control" placeholder="Nombre del equipo">
                            </div>
                            <div class="mb-3">
                                <label for="proyecto" class="form-label text-primary">Proyecto:</label>
                                <select name="proyecto" id="proyecto" class="form-select">
                                    <option selected>Elige tu proyecto</option>
                                    <option value="1">Proyecto 1</option>
                                    <option value="2">Proyecto 2</option>
                                    <option value="3">Proyecto 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="integrante" class="form-label text-primary">Integrantes:</label>
                                <select name="integrante" id="integrante" class="form-select">
                                    <option selected>Agrega al integrante</option>
                                    <option value="1">Integrante 1</option>
                                    <option value="2">Integrante 2</option>
                                    <option value="3">Integrante 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_i" class="form-label text-primary">Fecha de creación:</label>
                                <input type="date" name="fecha_i" id="fecha_i" class="form-control">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Crear equipo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>