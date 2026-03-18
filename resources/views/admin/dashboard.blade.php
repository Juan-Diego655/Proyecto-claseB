@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container admin-dashboard">

  <section class="admin-hero card">
    <div class="admin-hero-text">
      <span class="admin-badge">Panel de administración</span>
      <h1>Bienvenido a TechMarket Admin</h1>
      <p>
        Desde aquí puedes gestionar productos, categorías y revisar el estado
        general de tu ecommerce de tecnología.
      </p>

      <div class="admin-hero-actions">
        <a href="/product/create" class="btn btn-primary">+ Crear producto</a>
        <a href="{{ route('categories.create') }}" class="btn btn-ghost">+ Crear categoría</a>
      </div>
    </div>

    <div class="admin-hero-side">
      <div class="mini-stat">
        <span>Total productos</span>
        <strong>{{ $totalProducts ?? 0 }}</strong>
      </div>

      <div class="mini-stat">
        <span>Total categorías</span>
        <strong>{{ $totalCategories ?? 0 }}</strong>
      </div>

      <div class="mini-stat">
        <span>Último producto</span>
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
        <p class="stat-label">Categorías registradas</p>
        <h3>{{ $totalCategories ?? 0 }}</h3>
      </div>
    </div>

    <div class="card stat-card">
      <div class="stat-icon">🆕</div>
      <div>
        <p class="stat-label">Último producto agregado</p>
        <h3 style="font-size:18px;">{{ $lastProductName ?? 'No disponible' }}</h3>
      </div>
    </div>

    <div class="card stat-card">
      <div class="stat-icon">✅</div>
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
        <p class="small">Accesos directos para gestionar el sistema.</p>
      </div>

      <div class="quick-actions-grid">
        <a href="/product/create" class="quick-action">
          <span class="quick-icon">➕</span>
          <div>
            <strong>Crear producto</strong>
            <p>Agrega un nuevo producto al catálogo.</p>
          </div>
        </a>

        <a href="{{ route('categories.index') }}" class="quick-action">
          <span class="quick-icon">🗂️</span>
          <div>
            <strong>Gestionar categorías</strong>
            <p>Crea y elimina categorías del ecommerce.</p>
          </div>
        </a>

        <a href="/product/" class="quick-action">
          <span class="quick-icon">🛒</span>
          <div>
            <strong>Ver productos</strong>
            <p>Consulta el listado actual del catálogo.</p>
          </div>
        </a>

        <a href="/" class="quick-action">
          <span class="quick-icon">🌐</span>
          <div>
            <strong>Ir a la tienda</strong>
            <p>Ver la landing pública de TechMarket.</p>
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
          <span>Productos activos en catálogo</span>
          <strong>{{ $totalProducts ?? 0 }}</strong>
        </li>
        <li>
          <span>Categorías disponibles</span>
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
      <div class="empty">
        No hay productos recientes para mostrar.
      </div>
    @endif
  </section>

</div>
@endsection