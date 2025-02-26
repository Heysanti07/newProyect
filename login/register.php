<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <h2 class="text-center">Registro</h2>
          <?php if ($mensaje): ?>
          <div class="alert alert-danger"><?= $mensaje ?></div>
          <?php endif; ?>
          <form method="POST">
            <div class="mb-3">
              <label class="form-label">Usuario</label>
              <input type="text" name="usuario" class="form-control" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Contraseña</label>
              <input
                type="password"
                name="password"
                class="form-control"
                required
              />
            </div>
            <button type="submit" name="register" class="btn btn-primary w-100">
              Registrarse
            </button>
          </form>
          <p class="text-center mt-3">
            ¿Ya tienes cuenta? <a href="index.html">Inicia sesión aquí</a>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
