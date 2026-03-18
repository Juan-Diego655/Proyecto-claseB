@extends('layout.app')

@section('title', 'Carrito de compras')

@section('content')
<div class="container">

  <div class="header-row">
    <div>
      <h2>Carrito de Compras</h2>
      <p class="small">Consulta los productos agregados a tu carrito.</p>
    </div>
    <div class="tools">
      <a href="/product/" class="btn btn-ghost">Seguir comprando</a>
    </div>
  </div>

  @if(session('success'))
    <div class="card" style="padding:14px; margin-bottom:16px; color:#166534; background:rgba(22,163,74,.08); border:1px solid rgba(22,163,74,.2);">
      {{ session('success') }}
    </div>
  @endif

  @if($cartItems->count())
    <div class="card" style="padding:20px;">
      <div class="admin-table-wrap">
        <table class="admin-table">
          <thead>
            <tr>
              <th>Imagen</th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            @foreach($cartItems as $item)
              <tr>
                <td>
                  @if($item->product && $item->product->image)
                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="table-thumb">
                  @else
                    <div class="table-thumb placeholder-thumb">📦</div>
                  @endif
                </td>
                <td>{{ $item->product ? $item->product->name : 'Producto no disponible' }}</td>
                <td>
                  @if($item->product)
                    ${{ number_format($item->product->price, 0, ',', '.') }}
                  @else
                    -
                  @endif
                </td>
                <td>{{ $item->quantity }}</td>
                <td>
                  @if($item->product)
                    ${{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                  @else
                    -
                  @endif
                </td>
                <td>
                  <form action="{{ route('cart.remove', $item) }}" method="POST" style="margin:0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-ghost btn-sm">Quitar</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div style="margin-top:20px; text-align:right;">
        <h3>Total: ${{ number_format($total, 0, ',', '.') }}</h3>
      </div>
    </div>
  @else
    <div class="empty">
      Tu carrito está vacío.
    </div>
  @endif

</div>
@endsection