@extends('layouts.main')

@section('titulo', 'Detalle del proyecto')

@section('content')

<div class="container">
    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td> {{ $proyecto->id }}</td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td> {{ $proyecto->nombre }} </td>
        </tr>
        <tr>
            <td>Duración</td>
            <td> {{ $proyecto->duracion }} </td>
        </tr>
        
    </table>

    <a href="{{ route('proyectos.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>
</div>


@endsection