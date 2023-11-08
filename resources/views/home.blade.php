@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <!--  Esta construcción se utiliza para recorrer un arreglo (o una colección) de elementos y realizar un bloque de código para cada elemento del arreglo. -->
        @foreach($usuariosArray as $usuario)
        <div class="col-md-6">
            <ul class="list-group mt-4 mb-4">
                <!-- imprimirá el valor del nombre del usuario en la vista, tomando el valor almacenado en la clave 'name' del arreglo $usuario.  -->
                <li class="list-group-item">{{ $usuario['name']}}</li>
                <li class="list-group-item">{{ $usuario['username']}}</li>
                <li class="list-group-item">{{ $usuario['email']}}</li>
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection
