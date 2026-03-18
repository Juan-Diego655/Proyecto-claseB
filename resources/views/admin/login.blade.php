@extends('layout.admin')

@section('title', 'Login Admin')

@section('content')
<div class="form-wrap">
  <div class="card form-container">
    <h2 style="text-align:center; margin-bottom:10px;">Ingreso Administrador</h2>
    <p class="small" style="text-align:center; margin-bottom:18px;">
      Accede al panel de administración de TechMarket
    </p>

    <form action="{{ route('admin.login.submit') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="email">Correo</label>
        <input
          type="email"
          name="email"
          id="email"
          value="{{ old('email') }}"
          required
        >
        @error('email')
          <small style="color:#dc2626;">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Contraseña</label>
        <input
          type="password"
          name="password"
          id="password"
          required
        >
      </div>

      <div class="row-actions">
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        <a href="/" class="btn btn-ghost">Volver al inicio</a>
      </div>
    </form>
  </div>
</div>
@endsection