<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear Producto</title>

<style>
:root{
  --primary:#1d4ed8;
  --secondary:#0ea5e9;
  --bg:#f4f6fb;
  --card:#ffffff;
  --border:#e5e7eb;
  --text:#1f2937;
}

*{
  box-sizing:border-box;
  font-family: Arial, Helvetica, sans-serif;
}

body{
  margin:0;
  background:var(--bg);
}

/* NAVBAR */
.topbar{
  background: linear-gradient(90deg,var(--primary),var(--secondary));
  color:white;
  padding:15px 0;
}

.topbar-inner{
  max-width:1100px;
  margin:auto;
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:0 20px;
}

.logo{
  display:flex;
  align-items:center;
  gap:10px;
  font-weight:bold;
}

.logo-badge{
  width:35px;
  height:35px;
  background:rgba(255,255,255,.2);
  border-radius:8px;
  display:flex;
  align-items:center;
  justify-content:center;
}

.nav-links a{
  color:white;
  text-decoration:none;
  margin:0 10px;
  font-weight:500;
}

.nav-links a:hover{
  text-decoration:underline;
}

/* FORM */
main{
  display:flex;
  justify-content:center;
  padding:40px 20px;
}

.form-container{
  background:var(--card);
  width:100%;
  max-width:500px;
  padding:30px;
  border-radius:10px;
  border:1px solid var(--border);
  box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

h2{
  text-align:center;
}

.form-group{
  margin-bottom:15px;
}

label{
  display:block;
  margin-bottom:5px;
  font-weight:bold;
}

input, textarea, select{
  width:100%;
  padding:10px;
  border:1px solid var(--border);
  border-radius:6px;
}

textarea{
  resize:vertical;
  min-height:80px;
}

.btn{
  width:100%;
  padding:12px;
  background:var(--primary);
  color:white;
  border:none;
  border-radius:6px;
  cursor:pointer;
  font-weight:bold;
}

.btn:hover{
  background:#163bb8;
}

/* FOOTER */
.footer{
  background:#1f2937;
  color:white;
  text-align:center;
  padding:20px;
  margin-top:40px;
}

.footer p{
  margin:5px 0;
}
</style>
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

<main>
  <div class="form-container">
    <h2>Crear Nuevo Producto</h2>

    <form>

      <div class="form-group">
        <label>ID Producto</label>
        <input type="number" required>
      </div>

      <div class="form-group">
        <label>Nombre</label>
        <input type="text" required>
      </div>

      <div class="form-group">
        <label>Precio</label>
        <input type="number" step="0.01" required>
      </div>

      <div class="form-group">
        <label>Descripción</label>
        <textarea required></textarea>
      </div>

      <div class="form-group">
        <label>Imagen (URL)</label>
        <input type="url">
      </div>

      <div class="form-group">
        <label>Estado</label>
        <select required>
          <option value="">Seleccione</option>
          <option>Activo</option>
          <option>Inactivo</option>
        </select>
      </div>

      <button type="submit" class="btn">Guardar Producto</button>

    </form>
  </div>
</main>

<footer class="footer">
  <p>© 2026 TechMarket - Todos los derechos reservados</p>
  <p>Proyecto académico</p>
</footer>

</body>
</html>