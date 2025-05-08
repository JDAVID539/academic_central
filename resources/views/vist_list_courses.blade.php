@extends('layouts.app_modulo')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Lista de Cursos</h2>
        <a href="{{ route('courses.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Agregar Curso
        </a>
    </div>

    <form method="GET" action="{{ route('courses.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre de curso..." value="{{ request('buscar') }}">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i> Buscar
            </button>
        </div>
    </form>

    @if($courses->count())
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre del Curso</th>
                        <th>Descripción</th>
                        <th>Docente</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->name_course }}</td>
                            <td>{{ $course->description_course }}</td>
                            <td>{{ $course->teacher->user->name ?? 'No asignado' }}</td>
                            <td class="text-center">
                                <a href="{{ route('courses.subjects', $course->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i> Ver más
                                </a>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este curso?')">
                                        <i class="fa fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning text-center">
            <i class="fa fa-exclamation-circle"></i> No hay cursos registrados.
        </div>
    @endif
</div>
@endsection