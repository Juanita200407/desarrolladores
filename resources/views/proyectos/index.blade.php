@extends('layouts.main')

@section('titulo', 'Proyectos')

@section('content')
    @if($query)
        <div class="alert alert-warning" role="alert">
            <p>A continuación se presentan los resultados de la búsqueda: <span class="fw-bold">{{ $query }}</span></p>
        </div>
        
    @endif
    @if($mensaje = Session::get('exito'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $mensaje }}</p>
        <button type="button" class ="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="mt-3">
        <a href="{{ route('proyectos.create') }}" class="btn btn-secondary">
            Crear nuevo proyecto
        </a>
        
    </div>
    <div class="my-3">
        @if(count($proyectos) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proyectos as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td class="d-flex">
                            <a href="{{ route('proyectos.show', $item->id) }}" class="btn btn-outline-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('proyectos.edit', $item->id) }}" class="btn btn-outline-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                            <!-- <a href="{{ route('proyectos.destroy', $item->id) }}"  class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a> -->
                            <form action="{{ route('proyectos.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger rounded-circle">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $proyectos->links() }}
        @else
            <p>La búsqueda no encontró resultados</p>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //Captura del evento submit del formulario para eliminar
        $('.form-delete').submit(function(e){
            // Para el lanzamiento del evento
            e.preventDefault();
            //Lanzar alerta de sweetAlert
            Swal.fire({
                title: '¿Está seguro de eliminar el proyecto?',
                text: "¡Esta acción no se podrá deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#dc4545',
                confirmButtonText: 'Sí, eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection