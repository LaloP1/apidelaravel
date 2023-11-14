
 @extends('layouts.app')

        @section('content')
                <!-- Mostrado de los comics -->

                <div class="paginacion" >
                        <ul class="paginacion_lista">
                                <li>
                                @if ($page > 1)
                                        <a href="{{ route('home.index', ['page' => $page - 1]) }}" >Pagina anterior</a>
                                @endif
                                </li>
                                <li>
                                    <a href="{{ route('home.index', ['page' => $page + 1]) }}">Siguiente pagina</a>
                                </li>
                        </ul>
                </div>

                @foreach ($comics as $marvel)
                    <div class="contenedorp">
                                <div class="contenedor__comic">
                                        <img src="{{ $marvel->thumbnail->path }}/portrait_uncanny.{{ $marvel->thumbnail->extension }}" alt="{{ $marvel->title }}" class="img">
                                        <div class="contenedor_contenido">
                                        <h2 class="">{{ $marvel->title }}</h2>
                                        @foreach ($marvel->creators->items as $creator)
                                        <!-- Muestra el nombre del creador -->
                                        <h3 hidden>Nombre del creador: {{ $creator->name }}</h3>
                                        @endforeach
                                        <p class="descripcion">
                                             @if ($marvel->description)
                                                {{ $marvel->description }}
                                            @else
                                                 Descripción no disponible
                                            @endif
                                        </p>
                                        <!-- Agrega un enlace al botón "Ver Detalles" -->
                                        <a href="{{ route('home.show', ['home' => $marvel->id]) }}" class="boton__marvel">Ver Detalles</a>
                                     </div>
                                </div>
                    </div>
                @endforeach

        @endsection


