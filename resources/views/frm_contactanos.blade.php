@extends('layouts.app')
<center>
@section('content')
    <h1>contactanos</h1>
    
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        <label>
            Nombre :
            <br>
            <input type="text" name="name" required>
        </label>
        <br><br>

        <label>
        <label for="email">  Correo:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        <br><br>

        <label>
            telefono:
            <br>
            <input type="text" name="phone" required>
        </label>
        <br><br>
       
        <label>
            Mensaje:
            <br>
            <textarea name="message" rows="4" required></textarea>
        </label>

        <button type="submit">enviar</button>
    </form>
</center>
@endsection