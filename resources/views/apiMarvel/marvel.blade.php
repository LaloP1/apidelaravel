
        @extends('layouts.app')

        @section('content')
                <!-- Mostrado de los comics -->

                <div class="paginacion" >
                        <ul class="paginacion_lista">
                                <li>
                                <a href="{{ route('apiMarvel.marvel', ['page' => $page + 1]) }}">Siguiente pagina</a> 
                                </li>
                                <li>
                                @if ($page > 1)
                                        <a href="{{ route('apiMarvel.marvel', ['page' => $page - 1]) }}" >Pagina anterior</a>
                                @endif
                                </li>
                        </ul>
                </div>

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


