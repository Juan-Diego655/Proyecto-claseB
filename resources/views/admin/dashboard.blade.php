@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container admin-dashboard">

  <section class="admin-hero card">
    <div class="admin-hero-text">
      <span class="admin-badge">Panel de administración</span>
      <h1>Bienvenido a TechMarket Admin</h1>
      <p>
        Gestiona productos, revisa el estado general de la tienda y accede
        rápidamente a las funciones principales del sistema.
      </p>

      <div class="admin-hero-actions">
        <a href="/product/create" class="btn btn-primary">+ Crear producto</a>
        <a href="/product/" class="btn btn-ghost">Ver tienda</a>
      </div>
    </div>

    <div class="admin-hero-side">
      <div class="mini-stat">
        <span>Total productos</span>
        <strong>{{ $totalProducts ?? 0 }}</strong>
      </div>
      <div class="mini-stat">
        <span>Categorías</span>
        <strong>{{ $totalCategories ?? 0 }}</strong>
      </div>
      <div class="mini-stat">
        <span>Último ingreso</span>
        <strong>{{ $lastProductName ?? 'Sin registros' }}</strong>
      </div>
    </div>
  </section>

  <section class="admin-stats-grid">
    <div class="card stat-card">
      <div class="stat-icon">📦</div>
      <div>
        <p class="stat-label">Productos registrados</p>
        <h3>{{ $totalProducts ?? 0 }}</h3>
      </div>
    </div>

    <div class="card stat-card">
      <div class="stat-icon">🗂️</div>
      <div>
        <p class="stat-label">Categorías</p>
        <h3>{{ $totalCategories ?? 0 }}</h3>
      </div>
    </div>

    <div class="card stat-card">
      <div class="stat-icon">🆕</div>
      <div>
        <p class="stat-label">Último producto</p>
        <h3 style="font-size:18px;">{{ $lastProductName ?? 'No disponible' }}</h3>
      </div>
    </div>

    <div class="card stat-card">
      <div class="stat-icon">⚙️</div>
      <div>
        <p class="stat-label">Estado del panel</p>
        <h3>Activo</h3>
      </div>
    </div>
  </section>

  <section class="admin-main-grid">
    <div class="card admin-actions-card">
      <div class="section-head">
        <h2>Acciones rápidas</h2>
        <p class="small">Funciones clave del administrador.</p>
      </div>

      <div class="quick-actions-grid">
        <a href="/product/create" class="quick-action">
          <span class="quick-icon">➕</span>
          <div>
            <strong>Crear producto</strong>
            <p>Agregar un nuevo producto al catálogo.</p>
          </div>
        </a>

        <a href="/product/" class="quick-action">
          <span class="quick-icon">🛒</span>
          <div>
            <strong>Ver catálogo</strong>
            <p>Revisar los productos publicados.</p>
          </div>
        </a>

        <a href="/admin" class="quick-action">
          <span class="quick-icon">📊</span>
          <div>
            <strong>Actualizar dashboard</strong>
            <p>Recargar la vista general del panel.</p>
          </div>
        </a>

        <a href="/" class="quick-action">
          <span class="quick-icon">🌐</span>
          <div>
            <strong>Ir al inicio</strong>
            <p>Volver a la landing pública de TechMarket.</p>
          </div>
        </a>
      </div>
    </div>

    <div class="card admin-side-card">
      <div class="section-head">
        <h2>Resumen</h2>
        <p class="small">Vista rápida del sistema.</p>
      </div>

      <ul class="admin-summary-list">
        <li>
          <span>Productos visibles en tienda</span>
          <strong>{{ $totalProducts ?? 0 }}</strong>
        </li>
        <li>
          <span>Categorías registradas</span>
          <strong>{{ $totalCategories ?? 0 }}</strong>
        </li>
        <li>
          <span>Acceso administrativo</span>
          <strong>Habilitado</strong>
        </li>
        <li>
          <span>Último producto creado</span>
          <strong>{{ $lastProductName ?? 'Sin datos' }}</strong>
        </li>
      </ul>
    </div>
  </section>

  <section class="card recent-products-card">
    <div class="section-head">
      <h2>Productos recientes</h2>
      <p class="small">Consulta rápida del catálogo actual.</p>
    </div>

    @if(isset($recentProducts) && $recentProducts->count())
      <div class="admin-table-wrap">
        <table class="admin-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Imagen</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentProducts as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>
                  @if($product->image)
                    <img
                      src="{{ asset('storage/' . $product->image) }}"
                      alt="{{ $product->name }}"
                      class="table-thumb"
                    >
                  @else
                    <div class="table-thumb placeholder-thumb">📦</div>
                  @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>${{ number_format($product->price, 0, ',', '.') }}</td>
                <td>
                  <a href="/product/{{ $product->id }}" class="btn btn-ghost btn-sm">Ver</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <div class="empty">No hay productos recientes para mostrar.</div>
    @endif
  </section>

</div>
@endsection