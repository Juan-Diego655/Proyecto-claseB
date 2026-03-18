<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Panel Admin - TechMarket')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @stack('styles')
</head>
<body>

<header class="topbar">
  <div class="topbar-inner">
    <div class="logo">
      <div class="logo-badge">⚙️</div>
      <div>
        <div>TechMarket Admin</div>
        <div style="font-size:12px;">Panel de administración</div>
      </div>
    </div>

    <nav class="nav-links">
      <a href="/admin">Dashboard</a>
      <a href="/product/">Ver tienda</a>
    </nav>

    <div class="actions">
      @auth
        <form action="{{ route('admin.logout') }}" method="POST" style="margin:0;">
          @csrf
          <button type="submit" class="btn btn-ghost">Cerrar sesión</button>
        </form>
      @endauth
    </div>
  </div>
</header>

<main>
  @yield('content')
</main>

<footer class="footer">
  <p>© 2026 TechMarket Admin</p>
  <p>Panel interno de gestión</p>
</footer>

@stack('scripts')
</body>
</html>