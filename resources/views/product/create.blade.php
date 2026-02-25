<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear Producto</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="topbar">
  <div class="topbar-inner">
    <div class="logo">
      <div class="logo-badge">🛒</div>
      <div>
        <div>TechMarket</div>
        <div style="font-size:12px;">Tu súper de tecnología</div>
      </div>
    </div>

    <nav class="nav-links">
      <a href="/product/">Inicio</a>
      <a href="/product/create">Crear Producto</a>
    </nav>
  </div>
</header>

<main class="form-wrap">
  <div class="card form-container">
    <h2>Crear Nuevo Producto</h2>

    <form action="/product" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label>ID Producto</label>
        <input type="number" name="id_producto" required>
      </div>

      <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" required>
      </div>

      <div class="form-group">
        <label>Precio</label>
        <input type="number" name="precio" step="0.01" required>
      </div>

      <div class="form-group">
        <label>Descripción</label>
        <textarea name="descripcion" required></textarea>
      </div>


      <div class="form-group">
        <label>Imagen del Producto</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" required>
      </div>


      <div class="form-group" style="text-align:center;">
        <img id="preview" style="max-width:200px; display:none; border-radius:10px;">
      </div>

      <div class="form-group">
        <label>Estado</label>
        <select name="estado" required>
          <option value="">Seleccione</option>
          <option>Activo</option>
          <option>Inactivo</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Guardar Producto</button>

    </form>
  </div>
</main>

<footer class="footer">
  <p>© 2026 TechMarket - Todos los derechos reservados</p>
  <p>Proyecto académico</p>
</footer>

</body>
</html>