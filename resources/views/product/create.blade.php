@extends('layout.app')

@section('title','Crear Producto')

@section('content')
<main class="form-wrap">
  <div class="card form-container">
    <h2>Crear Nuevo Producto</h2>
    <p class="small" style="text-align:center;margin-top:6px;">
      Se guardará en el navegador (LocalStorage) y aparecerá en el listado.
    </p>

    <form id="productForm">
      <div class="form-grid">
        <div class="form-group">
          <label>ID Producto</label>
          <input type="number" id="id_producto" required min="1" placeholder="Ej: 200">
        </div>

        <div class="form-group">
          <label>Estado</label>
          <select id="estado" required>
            <option value="">Seleccione</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
          </select>
        </div>

        <div class="form-group full">
          <label>Nombre</label>
          <input type="text" id="nombre" required placeholder="Ej: Parlante Bluetooth">
        </div>

        <div class="form-group">
          <label>Precio</label>
          <input type="number" id="precio" required min="0" step="1" placeholder="Ej: 99000">
        </div>

        <div class="form-group">
          <label>Imagen (adjunto)</label>
          <input type="file" id="imagen_file" accept="image/*">
        </div>

        <div class="form-group full" style="text-align:center;">
          <img id="preview" style="max-width:220px;display:none;border-radius:12px;border:1px solid #e5e7eb;background:#fff;padding:6px;">
        </div>

        <div class="form-group full">
          <label>Descripción</label>
          <textarea id="descripcion" required placeholder="Describe el producto..."></textarea>
        </div>
      </div>

      <div class="row-actions">
        <button class="btn btn-primary" type="submit">Guardar Producto</button>
        <a class="btn btn-ghost" href="/product/">Volver al listado</a>
      </div>

      <div id="msg" class="small" style="text-align:center;margin-top:10px;"></div>
    </form>
  </div>
</main>
@endsection

@push('scripts')
<script>
const STORAGE_KEY = "techmarket_products_v1";

function svgDataUrl(svgString){
  return "data:image/svg+xml;charset=UTF-8," + encodeURIComponent(svgString);
}
function defaultImage(name){
  const safe = (name || "Producto").slice(0, 18);
  const svg = `
  <svg xmlns="http://www.w3.org/2000/svg" width="900" height="520" viewBox="0 0 900 520">
    <defs>
      <linearGradient id="g" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0" stop-color="#1d4ed8" stop-opacity="0.12"/>
        <stop offset="1" stop-color="#0ea5e9" stop-opacity="0.12"/>
      </linearGradient>
    </defs>
    <rect width="900" height="520" rx="34" fill="url(#g)"/>
    <rect x="80" y="170" width="740" height="280" rx="28" fill="#fff" stroke="#e5e7eb" stroke-width="10"/>
    <text x="80" y="110" font-family="Arial" font-size="40" font-weight="800" fill="#1f2937">${safe}</text>
    <text x="80" y="150" font-family="Arial" font-size="22" fill="#6b7280">Imagen por defecto</text>
    <circle cx="450" cy="310" r="70" fill="#e5e7eb"/>
    <rect x="340" y="390" width="220" height="26" rx="13" fill="#cbd5e1"/>
  </svg>`;
  return svgDataUrl(svg);
}

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
function saveProducts(products){
  localStorage.setItem(STORAGE_KEY, JSON.stringify(products));
}

const fileInput = document.getElementById("imagen_file");
const preview = document.getElementById("preview");
let imageDataUrl = "";

fileInput.addEventListener("change", () => {
  const file = fileInput.files[0];
  if(!file){
    preview.style.display = "none";
    imageDataUrl = "";
    return;
  }
  const reader = new FileReader();
  reader.onload = (e) => {
    imageDataUrl = e.target.result; // data:image/... base64
    preview.src = imageDataUrl;
    preview.style.display = "block";
  };
  reader.readAsDataURL(file);
});

document.getElementById("productForm").addEventListener("submit", (e) => {
  e.preventDefault();

  const id_producto = document.getElementById("id_producto").value.trim();
  const nombre = document.getElementById("nombre").value.trim();
  const precio = document.getElementById("precio").value.trim();
  const descripcion = document.getElementById("descripcion").value.trim();
  const estado = document.getElementById("estado").value.trim();
  const msg = document.getElementById("msg");

  msg.textContent = "";

  if(!id_producto || Number(id_producto) <= 0) { msg.textContent = "ID inválido."; return; }
  if(!nombre) { msg.textContent = "Nombre es obligatorio."; return; }
  if(!precio || Number(precio) < 0) { msg.textContent = "Precio inválido."; return; }
  if(!descripcion) { msg.textContent = "Descripción es obligatoria."; return; }
  if(!estado) { msg.textContent = "Estado es obligatorio."; return; }

  const products = loadProducts();
  const exists = products.some(p => String(p.id_producto) === String(id_producto));
  if(exists){ msg.textContent = "Ya existe un producto con ese ID."; return; }

  const finalImage = imageDataUrl || defaultImage(nombre);

  products.push({
    id_producto: Number(id_producto),
    nombre,
    precio: Number(precio),
    descripcion,
    imagen: finalImage,
    estado
  });

  saveProducts(products);
  msg.textContent = "Guardado ✅ Redirigiendo...";
  setTimeout(() => window.location.href = "/product/", 600);
});
</script>
@endpush