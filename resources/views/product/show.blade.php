<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>TechMarket - Detalle</title>

<style>
:root{
  --primary:#1d4ed8;
  --secondary:#0ea5e9;
  --bg:#f4f6fb;
  --card:#ffffff;
  --border:#e5e7eb;
  --text:#1f2937;
  --muted:#6b7280;
  --ok:#16a34a;
  --danger:#ef4444;
}
*{ box-sizing:border-box; font-family: Arial, Helvetica, sans-serif; }
body{ margin:0; background:var(--bg); color:var(--text); }

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
  gap: 12px;
}
.logo{ display:flex; align-items:center; gap:10px; font-weight:bold; }
.logo-badge{
  width:35px; height:35px;
  background:rgba(255,255,255,.2);
  border-radius:8px;
  display:flex; align-items:center; justify-content:center;
}
.nav-links{ display:flex; gap:10px; flex-wrap: wrap; }
.nav-links a{
  color:white; text-decoration:none; font-weight:500;
  padding: 6px 10px; border-radius: 999px;
  border: 1px solid rgba(255,255,255,.25);
  background: rgba(255,255,255,.12);
}
.nav-links a:hover{ filter: brightness(1.08); }

/* MAIN */
.container{
  max-width:1100px;
  margin:28px auto;
  padding:0 20px;
}
.detail{
  display:grid;
  grid-template-columns: 1.1fr .9fr;
  gap: 16px;
  align-items:start;
}
.card{
  background:var(--card);
  border:1px solid var(--border);
  border-radius:14px;
  box-shadow:0 10px 22px rgba(0,0,0,0.06);
  overflow:hidden;
}
.image-box{
  padding: 14px;
  background:#eef2ff;
}
.image-box img{
  width:100%;
  height: 380px;
  object-fit: contain;
  border-radius: 12px;
  background:#fff;
  border:1px solid var(--border);
}
.info{
  padding: 16px;
}
h1{
  margin: 0 0 6px;
  font-size: 22px;
}
.meta{
  display:flex;
  gap:10px;
  flex-wrap:wrap;
  align-items:center;
  color: var(--muted);
  font-size: 13px;
  margin-bottom: 10px;
}
.badge{
  font-weight: 800;
  padding: 5px 10px;
  border-radius: 999px;
  border: 1px solid var(--border);
  background:#f9fafb;
}
.badge.active{
  border-color: rgba(22,163,74,.35);
  background: rgba(22,163,74,.08);
  color:#166534;
}
.badge.inactive{
  border-color: rgba(239,68,68,.35);
  background: rgba(239,68,68,.08);
  color:#991b1b;
}
.desc{
  color: var(--muted);
  line-height: 1.5;
}
.price{
  margin-top: 12px;
  font-size: 22px;
  font-weight: 900;
  color: var(--primary);
}
.actions{
  margin-top: 14px;
  display:flex;
  gap:10px;
  flex-wrap:wrap;
}
.btn{
  padding: 12px 14px;
  border:none;
  border-radius: 12px;
  cursor:pointer;
  font-weight: 900;
}
.btn-primary{ background: var(--primary); color:#fff; }
.btn-primary:hover{ background:#163bb8; }
.btn-ghost{
  background:#f3f4f6;
  border:1px solid var(--border);
  color: var(--text);
  text-decoration:none;
  display:inline-flex;
  align-items:center;
  justify-content:center;
}
.btn-ghost:hover{ filter: brightness(0.98); }

.notice{
  padding: 14px;
  color: var(--muted);
}

/* FOOTER */
.footer{
  background:#1f2937;
  color:white;
  text-align:center;
  padding:20px;
  margin-top:40px;
}
.footer p{ margin:5px 0; color: rgba(255,255,255,.9); font-size: 14px; }

@media (max-width: 900px){
  .detail{ grid-template-columns: 1fr; }
  .image-box img{ height: 320px; }
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
        <div style="font-size:12px;opacity:.9;">Tu súper de tecnología</div>
      </div>
    </div>

    <nav class="nav-links">
      <a href="/product/">Inicio</a>
      <a href="/product/create">Crear Producto</a>
    </nav>
  </div>
</header>

<main class="container">
  <div id="notFound" class="card" style="display:none;">
    <div class="notice">
      <h2 style="margin:0 0 8px;">Producto no encontrado</h2>
      <p style="margin:0 0 12px;">Revisa el ID en la URL o vuelve al inicio.</p>
      <a class="btn-ghost" href="index.html">Volver al inicio</a>
    </div>
  </div>

  <section id="detail" class="detail" style="display:none;">
    <div class="card">
      <div class="image-box">
        <img id="img" alt="Imagen del producto" />
      </div>
    </div>

    <div class="card">
      <div class="info">
        <h1 id="name"></h1>

        <div class="meta">
          <span>ID: <strong id="pid"></strong></span>
          <span id="statusBadge" class="badge"></span>
        </div>

        <p id="desc" class="desc"></p>
        <div id="price" class="price"></div>

        <div class="actions">
          <button id="addBtn" class="btn btn-primary">Agregar</button>
          <a class="btn-ghost" href="/product/">Volver</a>
        </div>
      </div>
    </div>
  </section>
</main>

<footer class="footer">
  <p>© 2026 TechMarket - Todos los derechos reservados</p>
  <p>Proyecto académico</p>
</footer>

<script>
const STORAGE_KEY = "techmarket_products_v1";
const CART_KEY = "techmarket_cart_count_v1";

function loadProducts(){
  const raw = localStorage.getItem(STORAGE_KEY);
  if(!raw) return [];
  try{
    const arr = JSON.parse(raw);
    return Array.isArray(arr) ? arr : [];
  }catch{
    return [];
  }
}
function formatCOP(value){
  const n = Math.round(Number(value) || 0);
  return "$" + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
function getQueryParam(name){
  const url = new URL(window.location.href);
  return url.searchParams.get(name);
}
function loadCartCount(){
  const raw = localStorage.getItem(CART_KEY);
  const n = Number(raw);
  return Number.isFinite(n) ? n : 0;
}
function saveCartCount(n){
  localStorage.setItem(CART_KEY, String(n));
}

const id = getQueryParam("id");
const products = loadProducts();
const product = products.find(p => String(p.id_producto) === String(id));

const notFound = document.getElementById("notFound");
const detail = document.getElementById("detail");

if(!product){
  notFound.style.display = "block";
} else {
  detail.style.display = "grid";

  document.getElementById("img").src = product.imagen;
  document.getElementById("name").textContent = product.nombre;
  document.getElementById("pid").textContent = product.id_producto;
  document.getElementById("desc").textContent = product.descripcion;
  document.getElementById("price").textContent = formatCOP(product.precio);

  const badge = document.getElementById("statusBadge");
  const estado = (product.estado || "").toLowerCase();
  const active = estado === "activo";
  badge.textContent = active ? "Activo" : "Inactivo";
  badge.classList.add(active ? "active" : "inactive");

  const addBtn = document.getElementById("addBtn");
  addBtn.disabled = !active;
  addBtn.textContent = active ? "Agregar" : "No disponible";

  addBtn.addEventListener("click", () => {
    if(!active) return;
    let cart = loadCartCount();
    cart++;
    saveCartCount(cart);
    addBtn.textContent = "Agregado ✅";
    setTimeout(()=> addBtn.textContent = "Agregar", 900);
  });
}
</script>

</body>
</html>