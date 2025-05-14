{{-- filepath: c:\xampp\htdocs\academic_central\resources\views\users\students.blade.php --}}
@extends('layouts.app_modulo') <!-- Extiende el layout principal de la aplicación -->

@section('title', 'Estudiantes Registrados')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Estudiantes Registrados</h1>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection