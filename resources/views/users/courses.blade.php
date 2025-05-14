{{-- filepath: c:\xampp\htdocs\academic_central\resources\views\teachers\courses.blade.php --}}
@extends('layouts.app')

@section('title', 'Cursos de ' . $teacher->name)

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Cursos de {{ $teacher->name }}</h1>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre del Curso</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection