<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>TechMarket - Inicio</title>

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

    @include('layout.footer')

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