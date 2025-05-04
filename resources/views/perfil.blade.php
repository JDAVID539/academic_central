@extends('layouts.app_modulo')

@section('content')
<div class="container">
    <br>

    <br>
    <h2>Editar Perfil</h2>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Foto:</label><br>
            <img src="{{ asset('storage/' . $user->profile->foto) }}" width="120" height="120"><br><br>
            <input type="file" name="foto" class="form-control">
        </div>

        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->profile->phone }}">
        </div>

        <div class="form-group">
            <label>Dirección:</label>
            <input type="text" name="address" class="form-control" value="{{ $user->profile->address }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
@endsection

