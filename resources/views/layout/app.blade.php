<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'TechMarket')</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @stack('styles')
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
      <a href="/">Inicio</a>
      <a href="/product/">Productos</a>
      <a href="/product/create">Crear Producto</a>
    </nav>

    <div class="actions">
      <a href="{{ route('cart.index') }}" class="cart-link">
        <span class="cart-icon">🛒</span>
        @if(($cartCount ?? 0) > 0)
          <span class="cart-badge">{{ $cartCount }}</span>
        @endif
      </a>

      @hasSection('actions')
        @yield('actions')
      @endif
    </div>
  </div>
</header>

<main>
  @yield('content')
</main>

<footer class="footer">
  <p>© 2026 TechMarket - Todos los derechos reservados</p>
  <p>Proyecto académico</p>
</footer>

@stack('scripts')
</body>
</html>