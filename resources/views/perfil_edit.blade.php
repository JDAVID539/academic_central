@extends('layouts.app_modulo')

@section('content')
<div class="container">
    <br>
    <h2>Editar Perfil</h2>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Foto:</label><br>
            <img src="{{ asset('storage/' . $user->profile->foto) }}" width="120" height="120" alt="Foto de perfil"><br><br>
            <input type="file" name="foto" class="form-control">
        </div>

        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

     
       

        <div class="form-group">
            <label>Rol:</label>
            <input type="text" name="role" class="form-control" value="{{ $user->role }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
@endsection