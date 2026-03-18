@extends('layout.app')

@section('title', 'TechMarket - Inicio')

@section('content')

<section class="hero">
  <div class="container hero-content">
    <div class="hero-text">
      <span class="hero-badge">Super de tecnología</span>
      <h1>Todo lo que necesitas en tecnología, en un solo lugar.</h1>
      <p>
        En TechMarket encuentras accesorios, dispositivos y soluciones tech
        para estudiar, trabajar, jugar y vivir mejor.
      </p>

      <div class="hero-actions">
        <a href="/product/" class="btn btn-primary">Ver productos</a>
        <a href="/product/create" class="btn btn-ghost">Crear producto</a>
      </div>
    </div>

    <div class="hero-visual card">
      <div class="hero-grid">
        <div class="hero-item">🎧 Audífonos</div>
        <div class="hero-item">⌨️ Teclados</div>
        <div class="hero-item">🖱️ Mouse</div>
        <div class="hero-item">🔋 Power Bank</div>
      </div>
    </div>
  </div>
</section>

<section class="features">
  <div class="container">
    <div class="section-head">
      <h2>¿Por qué comprar en TechMarket?</h2>
      <p class="small">Pensado como un ecommerce moderno, simple y funcional.</p>
    </div>

    <div class="features-grid">
      <div class="card feature-card">
        <div class="feature-icon">⚡</div>
        <h3>Compra rápida</h3>
        <p>Explora productos tecnológicos de forma simple y ordenada.</p>
      </div>

      <div class="card feature-card">
        <div class="feature-icon">🛡️</div>
        <h3>Confianza</h3>
        <p>Una experiencia visual clara, limpia y enfocada en el usuario.</p>
      </div>

      <div class="card feature-card">
        <div class="feature-icon">🚚</div>
        <h3>Envíos y disponibilidad</h3>
        <p>Productos listos para integrarse a un flujo real de ecommerce.</p>
      </div>

      <div class="card feature-card">
        <div class="feature-icon">💡</div>
        <h3>Variedad tech</h3>
        <p>Desde accesorios básicos hasta productos destacados del catálogo.</p>
      </div>
    </div>
  </div>
</section>

<section class="featured-products">
  <div class="container">
    <div class="section-head">
      <h2>Productos destacados</h2>
      <p class="small">Una muestra real del catálogo de TechMarket.</p>
    </div>

    <div class="landing-grid">
      @foreach($featuredProducts as $product)
        <article class="card landing-card">
          <div class="landing-img" style="padding:20px;">
            @if($product->image)
              <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->name }}"
                style="width:100%; height:100%; object-fit:contain;"
              >
            @else
              <span style="font-size:64px;">📦</span>
            @endif
          </div>

          <div class="landing-body">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <span class="card-price">${{ number_format($product->price, 0, ',', '.') }}</span>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>

<section class="cta-section">
  <div class="container">
    <div class="card cta-card">
      <h2>Explora el catálogo de TechMarket</h2>
      <p>
        Ingresa al listado de productos y continúa construyendo la experiencia ecommerce.
      </p>
      <a href="/product/" class="btn btn-primary">Ir al catálogo</a>
    </div>
  </div>
</section>

@endsection