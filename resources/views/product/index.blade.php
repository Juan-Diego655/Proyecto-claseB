@extends('layout.app')

@section('title', 'TechMarket - Productos')

@section('content')

<div class="container">

  <div class="header-row">
    <div>
      <h2>Productos Tecnológicos</h2>
      <p class="small">Clic en el nombre o imagen para ver detalles.</p>
    </div>
    <div class="tools">
      <input type="search" id="search" placeholder="Buscar por nombre...">
    </div>
  </div>

  @if(session('success'))
    <div class="card" style="padding:14px; margin-bottom:16px; color:#166534; background:rgba(22,163,74,.08); border:1px solid rgba(22,163,74,.2);">
      {{ session('success') }}
    </div>
  @endif

  @if(session('error'))
    <div class="card" style="padding:14px; margin-bottom:16px; color:#991b1b; background:rgba(239,68,68,.08); border:1px solid rgba(239,68,68,.2);">
      {{ session('error') }}
    </div>
  @endif

  <div class="grid" id="grid">

    @foreach ($misProductos as $product)
      <div class="card product-card">

        <a class="card-img" href="/product/{{ $product->id }}">
          @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
          @else
            <img src="https://media.istockphoto.com/id/846183008/es/vector/%C3%ADcono-de-perfil-de-avatar-por-defecto-marcador-de-posici%C3%B3n-de-foto-gris.jpg?s=612x612&w=0&k=20&c=CLZoOwpSgoDpY_4ELU9OaY23p0B0mwjXCfbiyc7g9u4=" alt="Sin imagen">
          @endif
        </a>

        <div class="card-body">
          <div class="card-meta">
            <span>{{ $product->id }}</span>
            <span class="badge active">Activo</span>
          </div>

          <a class="card-name" href="/product/{{ $product->id }}">
            {{ $product->name }}
          </a>

          <p class="card-desc">{{ $product->description }}</p>

          <div class="card-price">
            ${{ number_format($product->price, 0, ',', '.') }}
          </div>
        </div>

        <div class="card-footer">
          <form action="{{ route('cart.add', $product) }}" method="POST" style="margin:0;">
            @csrf
            <button type="submit" class="btn btn-primary">Agregar</button>
          </form>

          <a class="btn btn-ghost" href="/product/{{ $product->id }}">
            Ver
          </a>

          <form action="{{ route('product.destroy', $product) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-ghost" style="flex:1; max-width:65px;">
              Elim.
            </button>
          </form>
        </div>

      </div>
    @endforeach

  </div>

  <div class="empty" id="empty" style="display:none;">
    No hay productos para mostrar.
  </div>

</div>

@push('scripts')
<script>
  const searchInput = document.getElementById('search');
  const emptyState  = document.getElementById('empty');

  searchInput.addEventListener('input', () => {
    const query = searchInput.value.trim().toLowerCase();
    const cards = document.querySelectorAll('.product-card');
    let visible = 0;

    cards.forEach(card => {
      const name = card.querySelector('.card-name').textContent.toLowerCase();
      const show = name.includes(query);
      card.style.display = show ? '' : 'none';
      if (show) visible++;
    });

    emptyState.style.display = visible === 0 ? 'block' : 'none';
  });
</script>
@endpush

@endsection