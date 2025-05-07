@extends('layouts.app_modulo')

@section('content')
<div class="container mt-4">
    <br>
    <h2>Lista de Cursos</h2>
    
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Agregar Curso</a>
    <form method="GET" action="{{ route('courses.index') }}">
        <div class="mb-3">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre de curso...">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <br>

    @if($courses->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Curso</th>
                    <th>Descripción</th>
                    <th>Docente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->name_course }}</td>
                        <td>{{ $course->description_course }}</td>
                        <td>{{ $course->teacher->user->name ?? 'No asignado' }}</td>

                        <td>
                            <!-- Botones futuros para editar/eliminar -->
                            <a href="{{ route('courses.subjects', $course->id) }}" class="btn btn-info btn-sm">Ver mas</a>
                            <a href="{{route('courses.edit', $course->id)}}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este curso?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay cursos registrados.</p>
    @endif
</div>
@endsection

