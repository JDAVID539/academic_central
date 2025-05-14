{{-- filepath: c:\xampp\htdocs\academic_central\resources\views\users\teachers.blade.php --}}
@extends('layouts.app_modulosuperadmin') <!-- Extiende el layout principal de la aplicación -->

@section('title', 'Profesores Registrados')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Profesores Registrados</h1>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
             
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection