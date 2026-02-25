<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>TechMarket - Inicio</title>

<style>
:root{
  --primary:#1d4ed8;
  --secondary:#0ea5e9;
  --bg:#f4f6fb;
  --card:#ffffff;
  --border:#e5e7eb;
  --text:#1f2937;
  --muted:#6b7280;
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
.nav-links{ display:flex; gap: 10px; flex-wrap: wrap; }
.nav-links a{
  color:white; text-decoration:none; font-weight:500;
  padding: 6px 10px; border-radius: 999px;
  border: 1px solid rgba(255,255,255,.25);
  background: rgba(255,255,255,.12);
}
.nav-links a:hover{ filter: brightness(1.08); }

.actions{ display:flex; gap:10px; align-items:center; }
.actions .pill{
  background:rgba(255,255,255,.2);
  padding:8px 12px;
  border-radius:20px;
  white-space: nowrap;
}

/* MAIN */
.container{
  max-width:1100px;
  margin:28px auto;
  padding:0 20px;
}
.header-row{
  display:flex;
  justify-content:space-between;
  align-items:flex-end;
  gap:12px;
  flex-wrap: wrap;
  margin-bottom: 14px;
}
.header-row h2{ margin:0; }
.small{
  margin: 4px 0 0;
  color: var(--muted);
  font-size: 13px;
}
.tools{
  display:flex;
  gap:10px;
  flex-wrap: wrap;
  align-items:center;
}
.tools input{
  padding:10px 12px;
  border:1px solid var(--border);
  border-radius: 10px;
  min-width: 240px;
  outline:none;
}
.tools input:focus{ border-color: var(--primary); }

.grid{
  display:grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap:16px;
}

.card{
  background:var(--card);
  border:1px solid var(--border);
  border-radius:14px;
  overflow:hidden;
  box-shadow:0 10px 22px rgba(0,0,0,0.06);
  display:flex;
  flex-direction:column;
  min-height: 360px;
}
.thumb{
  height: 160px;
  background: #eef2ff;
  display:flex;
  align-items:center;
  justify-content:center;
  padding: 12px;
}
.thumb a{ display:block; width:100%; height:100%; }
.thumb img{
  width:100%;
  height:100%;
  object-fit: contain;
  border-radius: 10px;
}
.content{
  padding:14px;
  display:flex;
  flex-direction:column;
  gap:8px;
  flex:1;
}
.name-link{
  color: var(--text);
  text-decoration: none;
}
.name-link:hover{ text-decoration: underline; }

.meta{
  display:flex;
  justify-content:space-between;
  gap:10px;
  align-items:center;
  color: var(--muted);
  font-size: 12px;
}
.badge{
  font-weight: 700;
  padding: 4px 8px;
  border-radius: 999px;
  border: 1px solid var(--border);
  background: #f9fafb;
  color: var(--text);
}
.badge.active{
  border-color: rgba(22,163,74,.35);
  background: rgba(22,163,74,.08);
  color: #166534;
}
.badge.inactive{
  border-color: rgba(239,68,68,.35);
  background: rgba(239,68,68,.08);
  color: #991b1b;
}

.desc{
  margin:0;
  color: var(--muted);
  font-size: 13px;
  line-height: 1.35;
}
.price{
  font-size: 18px;
  font-weight: 800;
  color: var(--primary);
  margin-top: 4px;
}
.card-footer{
  padding: 12px 14px 14px;
  border-top: 1px solid var(--border);
  display:flex;
  gap: 10px;
}
.btn{
  width:100%;
  padding:10px;
  border:none;
  border-radius:10px;
  cursor:pointer;
  font-weight:800;
}
.btn-primary{ background:var(--primary); color:white; }
.btn-primary:hover{ background:#163bb8; }
.btn-ghost{
  background:#f3f4f6;
  border:1px solid var(--border);
  color: var(--text);
}
.btn-ghost:hover{ filter: brightness(0.98); }

.empty{
  background: #fff;
  border: 1px dashed var(--border);
  border-radius: 14px;
  padding: 18px;
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

/* Responsive */
@media (max-width: 520px){
  .tools input{ min-width: 100%; }
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
      <a href="">Inicio</a>
      <a href="create">Crear Producto</a>
    </nav>

    <div class="actions">
      <div class="pill">🛍️ Carrito: <strong id="cartCount">0</strong></div>
    </div>
  </div>
</header>

<main class="container">
  <div class="header-row">
    <div>
      <h2>Productos Tecnológicos</h2>
      <p class="small">Clic en el nombre o la imagen para ver detalles. Los productos nuevos se guardan en LocalStorage.</p>
    </div>
    <div class="tools">
      <input id="search" type="search" placeholder="Buscar por nombre..." />
      <button class="btn btn-ghost" id="resetData" type="button">Restaurar demo</button>
    </div>
  </div>

  <section id="grid" class="grid"></section>

  <div id="empty" class="empty" style="display:none;">
    No hay productos para mostrar.
  </div>
</main>

<footer class="footer">
  <p>© 2026 TechMarket - Todos los derechos reservados</p>
  <p>Proyecto académico</p>
</footer>

<script>
/* ===== Helpers: imágenes SVG embebidas como data URL ===== */
function svgDataUrl(svgString){
  return "data:image/svg+xml;charset=UTF-8," + encodeURIComponent(svgString);
}

function demoImage(type){
  const common = (title, subtitle) => `
  <svg xmlns="http://www.w3.org/2000/svg" width="900" height="520" viewBox="0 0 900 520">
    <defs>
      <linearGradient id="g" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0" stop-color="#1d4ed8" stop-opacity="0.10"/>
        <stop offset="1" stop-color="#0ea5e9" stop-opacity="0.10"/>
      </linearGradient>
    </defs>
    <rect width="900" height="520" rx="34" fill="url(#g)"/>
    <text x="60" y="90" font-family="Arial" font-size="42" font-weight="800" fill="#1f2937">${title}</text>
    <text x="60" y="140" font-family="Arial" font-size="24" fill="#6b7280">${subtitle}</text>
    <g transform="translate(0,0)">
      <!-- marco -->
      <rect x="70" y="180" width="760" height="290" rx="26" fill="#ffffff" stroke="#e5e7eb" stroke-width="10"/>
    </g>
  </svg>`;

  const audio = `
  <svg xmlns="http://www.w3.org/2000/svg" width="900" height="520" viewBox="0 0 900 520">
    <rect width="900" height="520" rx="34" fill="#eef2ff"/>
    <text x="60" y="90" font-family="Arial" font-size="42" font-weight="800" fill="#1f2937">Audífonos</text>
    <text x="60" y="140" font-family="Arial" font-size="24" fill="#6b7280">Bluetooth • Noise cancel</text>
    <rect x="90" y="200" width="720" height="250" rx="40" fill="#ffffff" stroke="#e5e7eb" stroke-width="10"/>
    <circle cx="320" cy="325" r="70" fill="#e5e7eb"/>
    <circle cx="580" cy="325" r="70" fill="#e5e7eb"/>
    <rect x="360" y="290" width="180" height="70" rx="35" fill="#cbd5e1"/>
  </svg>`;

  const keyboard = `
  <svg xmlns="http://www.w3.org/2000/svg" width="900" height="520" viewBox="0 0 900 520">
    <rect width="900" height="520" rx="34" fill="#ecfeff"/>
    <text x="60" y="90" font-family="Arial" font-size="42" font-weight="800" fill="#1f2937">Teclado</text>
    <text x="60" y="140" font-family="Arial" font-size="24" fill="#6b7280">Mecánico • RGB</text>
    <rect x="110" y="210" width="680" height="220" rx="30" fill="#ffffff" stroke="#e5e7eb" stroke-width="10"/>
    <g fill="#e5e7eb">
      <rect x="160" y="260" width="80" height="40" rx="10"/>
      <rect x="260" y="260" width="80" height="40" rx="10"/>
      <rect x="360" y="260" width="80" height="40" rx="10"/>
      <rect x="460" y="260" width="80" height="40" rx="10"/>
      <rect x="560" y="260" width="180" height="40" rx="10"/>
      <rect x="160" y="320" width="580" height="50" rx="12"/>
    </g>
  </svg>`;

  const mouse = `
  <svg xmlns="http://www.w3.org/2000/svg" width="900" height="520" viewBox="0 0 900 520">
    <rect width="900" height="520" rx="34" fill="#fff7ed"/>
    <text x="60" y="90" font-family="Arial" font-size="42" font-weight="800" fill="#1f2937">Mouse</text>
    <text x="60" y="140" font-family="Arial" font-size="24" fill="#6b7280">Ergonómico • Inalámbrico</text>
    <ellipse cx="470" cy="340" rx="220" ry="140" fill="#ffffff" stroke="#e5e7eb" stroke-width="10"/>
    <line x1="470" y1="220" x2="470" y2="420" stroke="#cbd5e1" stroke-width="10" />
    <circle cx="470" cy="280" r="18" fill="#cbd5e1"/>
  </svg>`;

  const powerbank = `
  <svg xmlns="http://www.w3.org/2000/svg" width="900" height="520" viewBox="0 0 900 520">
    <rect width="900" height="520" rx="34" fill="#f0fdf4"/>
    <text x="60" y="90" font-family="Arial" font-size="42" font-weight="800" fill="#1f2937">Power Bank</text>
    <text x="60" y="140" font-family="Arial" font-size="24" fill="#6b7280">20.000mAh • USB-C</text>
    <rect x="250" y="200" width="400" height="260" rx="40" fill="#ffffff" stroke="#e5e7eb" stroke-width="10"/>
    <rect x="320" y="250" width="260" height="20" rx="10" fill="#e5e7eb"/>
    <rect x="320" y="290" width="180" height="20" rx="10" fill="#e5e7eb"/>
    <circle cx="590" cy="405" r="20" fill="#cbd5e1"/>
  </svg>`;

  const camera = `
  <svg xmlns="http://www.w3.org/2000/svg" width="900" height="520" viewBox="0 0 900 520">
    <rect width="900" height="520" rx="34" fill="#fdf2f8"/>
    <text x="60" y="90" font-family="Arial" font-size="42" font-weight="800" fill="#1f2937">Cámara WiFi</text>
    <text x="60" y="140" font-family="Arial" font-size="24" fill="#6b7280">1080p • Visión nocturna</text>
    <rect x="240" y="210" width="420" height="240" rx="40" fill="#ffffff" stroke="#e5e7eb" stroke-width="10"/>
    <rect x="320" y="260" width="260" height="140" rx="22" fill="#e5e7eb"/>
    <circle cx="450" cy="330" r="40" fill="#cbd5e1"/>
    <circle cx="450" cy="330" r="18" fill="#94a3b8"/>
  </svg>`;

  const map = { audio, keyboard, mouse, powerbank, camera };
  return svgDataUrl(map[type] || common("Producto", "TechMarket"));
}

/* ===== Storage ===== */
const STORAGE_KEY = "techmarket_products_v1";
const CART_KEY = "techmarket_cart_count_v1";

function getDefaultProducts(){
  return [
    {
      id_producto: 101,
      nombre: "Audífonos Bluetooth NoiseLite",
      precio: 199900,
      descripcion: "Cancelación de ruido, 40h batería, micrófono dual.",
      imagen: demoImage("audio"),
      estado: "activo"
    },
    {
      id_producto: 102,
      nombre: "Teclado Mecánico RGB Switch Red",
      precio: 169900,
      descripcion: "Hot-swap, anti-ghosting, iluminación personalizable.",
      imagen: demoImage("keyboard"),
      estado: "activo"
    },
    {
      id_producto: 103,
      nombre: "Mouse Inalámbrico ErgoGrip 2.4G",
      precio: 89900,
      descripcion: "Ergonómico, DPI ajustable, recargable USB-C.",
      imagen: demoImage("mouse"),
      estado: "activo"
    },
    {
      id_producto: 104,
      nombre: "Power Bank 20.000mAh TurboCharge",
      precio: 119900,
      descripcion: "Carga rápida PD, 2 USB + USB-C, pantalla LED.",
      imagen: demoImage("powerbank"),
      estado: "activo"
    },
    {
      id_producto: 105,
      nombre: "Cámara Wi-Fi 1080p VisionCam Mini",
      precio: 139900,
      descripcion: "Detección movimiento, audio 2 vías, visión nocturna.",
      imagen: demoImage("camera"),
      estado: "activo"
    }
  ];
}

function loadProducts(){
  const raw = localStorage.getItem(STORAGE_KEY);
  if(!raw){
    const defaults = getDefaultProducts();
    localStorage.setItem(STORAGE_KEY, JSON.stringify(defaults));
    return defaults;
  }
  try{
    const parsed = JSON.parse(raw);
    return Array.isArray(parsed) ? parsed : getDefaultProducts();
  }catch{
    return getDefaultProducts();
  }
}

function saveProducts(products){
  localStorage.setItem(STORAGE_KEY, JSON.stringify(products));
}

function formatCOP(value){
  // formatea estilo colombiano sin depender de Intl (por si acaso)
  const n = Math.round(Number(value) || 0);
  return "$" + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

/* ===== UI Render ===== */
const grid = document.getElementById("grid");
const empty = document.getElementById("empty");
const search = document.getElementById("search");
const resetBtn = document.getElementById("resetData");
const cartCountEl = document.getElementById("cartCount");

let products = loadProducts();

function render(list){
  grid.innerHTML = "";
  if(!list.length){
    empty.style.display = "block";
    return;
  }
  empty.style.display = "none";

  list.forEach(p => {
    const estado = (p.estado || "").toLowerCase();
    const isActive = estado === "activo";

    const detailUrl = `producto.html?id=${encodeURIComponent(p.id_producto)}`;

    const card = document.createElement("article");
    card.className = "card";
    card.innerHTML = `
      <div class="thumb">
        <a href="${detailUrl}" title="Ver detalles">
          <img src="${p.imagen}" alt="${p.nombre}">
        </a>
      </div>
      <div class="content">
        <div class="meta">
          <span>ID: ${p.id_producto}</span>
          <span class="badge ${isActive ? "active" : "inactive"}">${isActive ? "Activo" : "Inactivo"}</span>
        </div>
        <h3 style="margin:0;">
          <a class="name-link" href="${detailUrl}">${p.nombre}</a>
        </h3>
        <p class="desc">${p.descripcion}</p>
        <div class="price">${formatCOP(p.precio)}</div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary" ${isActive ? "" : "disabled"} data-add="${p.id_producto}">
          ${isActive ? "Agregar" : "No disponible"}
        </button>
        <a class="btn btn-ghost" style="text-decoration:none; display:flex; align-items:center; justify-content:center;" href="${detailUrl}">
          Ver
        </a>
      </div>
    `;
    grid.appendChild(card);
  });
}

function applySearch(){
  const q = (search.value || "").trim().toLowerCase();
  const filtered = products.filter(p => (p.nombre || "").toLowerCase().includes(q));
  render(filtered);
}

/* ===== Cart demo ===== */
function loadCartCount(){
  const raw = localStorage.getItem(CART_KEY);
  const n = Number(raw);
  return Number.isFinite(n) ? n : 0;
}
function saveCartCount(n){
  localStorage.setItem(CART_KEY, String(n));
}
let cartCount = loadCartCount();
cartCountEl.textContent = cartCount;

document.addEventListener("click", (e) => {
  const btn = e.target.closest("[data-add]");
  if(!btn) return;

  const id = btn.getAttribute("data-add");
  const prod = products.find(p => String(p.id_producto) === String(id));
  if(!prod) return;

  const estado = (prod.estado || "").toLowerCase();
  if(estado !== "activo") return;

  cartCount++;
  saveCartCount(cartCount);
  cartCountEl.textContent = cartCount;
});

/* ===== Events ===== */
search.addEventListener("input", applySearch);

resetBtn.addEventListener("click", () => {
  const defaults = getDefaultProducts();
  saveProducts(defaults);
  products = defaults;
  search.value = "";
  applySearch();
});

/* init */
render(products);
</script>

</body>
</html>