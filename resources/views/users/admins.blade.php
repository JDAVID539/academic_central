{{-- filepath: c:\xampp\htdocs\academic_central\resources\views\users\admins.blade.php --}}
@extends('layouts.app')

@section('title', 'Administradores Registrados')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Administradores Registrados</h1>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection