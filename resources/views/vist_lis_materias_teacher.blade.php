@extends('layouts.app_moduloteacher')

@section('content')
<br>
<br>
<h3>Materias asignadas</h3>
@if($subjects->count())
    <ul>
        @foreach($subjects as $subject)
            <li>
                {{ $subject->name_subject }}
                <a href="{{ route('teacher.subjects.show', $subject->id) }}" class="btn btn-primary btn-sm">Ver más</a>
            </li>
        @endforeach
    </ul>
@else
    <p>No hay materias asignadas.</p>
@endif
@endsection

