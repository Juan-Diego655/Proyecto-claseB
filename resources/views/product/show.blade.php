@extends('layout.app')

@section('title', $producto->name)

@section('content')
<div class="container">

  <section class="detail">
    <div class="card">
      <div class="image-box">
        @if($producto->image)
          <img src="{{ asset('storage/' . $producto->image) }}" alt="{{ $producto->name }}">
        @else
          <img src="https://media.istockphoto.com/id/846183008/es/vector/%C3%ADcono-de-perfil-de-avatar-por-defecto-marcador-de-posici%C3%B3n-de-foto-gris.jpg?s=612x612&w=0&k=20&c=CLZoOwpSgoDpY_4ELU9OaY23p0B0mwjXCfbiyc7g9u4=" alt="Sin imagen">
        @endif
      </div>
    </div>

    <div class="card">
      <div class="info">
        <h1>{{ $producto->name }}</h1>

        <div class="card-meta" style="margin-bottom:12px;">
          <span>ID: <strong>{{ $producto->id }}</strong></span>
          <span class="badge active">Activo</span>
        </div>

        <p class="card-desc" style="margin-bottom:18px;">
          {{ $producto->description }}
        </p>

        <div class="card-price" style="font-size:24px; margin-bottom:20px;">
          ${{ number_format($producto->price, 0, ',', '.') }}
        </div>

        <div class="row-actions">
          <button class="btn btn-primary">Agregar al carrito</button>
          <a class="btn btn-ghost" href="/product/">Volver</a>
        </div>
      </div>
    </div>
  </section>

</div>
@endsection