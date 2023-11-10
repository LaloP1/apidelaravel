
        @extends('layouts.app')

        @section('content')
                <!-- Mostrado de los comics -->
                @foreach ($comics as $marvel)
                    <div class="contenedorp">   
                                <div class="contenedor__comic">
                                        <img src="{{ $marvel->thumbnail->path }}/portrait_uncanny.{{ $marvel->thumbnail->extension }}" alt="{{ $marvel->title }}" class="img">
                                     <div class="contenedor_contenido">
                                        <h2 class="titulo">{{ $marvel->title }}</h2>
                                        <p class="descripcion">{{ $marvel->description }}</p>
                                     </div>
                                </div>
                    </div>
                @endforeach
        @endsection


