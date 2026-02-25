<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>TechMarket - Detalle</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

    @include('layout.navbar')
  </div>
</header>

<main class="container">
  <div id="notFound" class="card" style="display:none;">
    <div class="notice">
      <h2 style="margin:0 0 8px;">Producto no encontrado</h2>
      <p style="margin:0 0 12px;">Revisa el ID en la URL o vuelve al inicio.</p>
      <a class="btn-ghost" href="/product/">Volver al inicio</a>
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

    @include('layout.footer')

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