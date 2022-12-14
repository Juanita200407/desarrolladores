@extends('layouts.main')

@section('titulo', 'Nuevo proyecto')

@section('content')
    <form action="{{ route('proyectos.store') }}" method="post" class="needs-validation" novalidate>
        @csrf 
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
            <label for="nombre">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="duracion" name="duracion" placeholder="duracion" required>
            <label for="duracion">Duración</label>
        </div>
        <button type="submit" class="btn btn-outline-secondary">Guardar</button>
    </form>
@endsection

@section('scripts')
    <script>
        (() => {
        'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

    </script>
@endsection
