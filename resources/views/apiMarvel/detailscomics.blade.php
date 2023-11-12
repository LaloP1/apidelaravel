@extends('layouts.app')

@section('content')
    <div class="contenedorp">
        <div class="contenedor__comic">
            <img src="{{ $comic->thumbnail->path }}/portrait_uncanny.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}" class="img">
            <div class="contenedor_contenido">
                <h2 class="titulo">{{ $comic->title }}</h2>
                <p class="descripcion">{{ $comic->description }}</p>
                <!-- Otros detalles del cómic según sea necesario -->
                <a href="{{ route('home.index') }}" class="boton__marvel">Regresar</a>
            </div>
        </div>
    </div>
@endsection
