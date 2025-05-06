@extends('layouts.app_moduloteacher')

@section('content')
<br>
<br>
<h3>Cursos asignados</h3>
@if($courses->count())
    <ul>
        @foreach($courses as $course)
            <li>{{ $course->name_course }}</li>
        @endforeach
    </ul>
@else
    <p>No tienes cursos asignados.</p>
@endif
@endsection
