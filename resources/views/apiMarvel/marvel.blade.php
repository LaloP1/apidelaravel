
        @extends('layouts.app')

        @section('content')
                <!-- Mostrado de los comics -->
                @foreach ($comics as $comic)
                    <div class="contenedorp">   
                                <div class="contenedor__comic">
                                        <img src="{{ $comic->thumbnail->path }}/portrait_uncanny.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}" class="img">
                                     <div class="contenedor_contenido">
                                        <h2 class="titulo">{{ $comic->title }}</h2>
                                        <p class="descripcion">{{ $comic->description }}</p>
                                     </div>
                                </div>
                    </div>
                @endforeach
        @endsection


