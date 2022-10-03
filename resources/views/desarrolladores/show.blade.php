@extends('layouts.main')

@section('titulo', 'Detalle del desarrollador')

@section('content')

<div class="container">
    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td> {{ $desarrolladores->id }}</td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td> {{ $desarrolladores->nombre }} </td>
        </tr>
        <tr>
            <td>Apellido</td>
            <td> {{ $desarrolladores->apellido }} </td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td> {{ $desarrolladores->telefono }} </td>
        </tr>
        <tr>
            <td>Dirección</td>
            <td> {{ $desarrolladores->direccion }} </td>
        </tr>
        <tr>
            <td>Proyecto</td>
            <td> {{ $desarrolladores->proyecto }} </td>
        </tr>
        
    </table>

    <a href="{{ route('desarrolladores.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>
</div>


@endsection