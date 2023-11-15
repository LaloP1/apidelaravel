
 @extends('layouts.app')

        @section('content')
                <!-- Mostrado de los comics -->

                <div class=" relative h-64 bg-cover bg-center" style="background-image: url('https://www.todofondos.net/wp-content/uploads/fondo-de-pantalla-marvel-studios-hd-4k-peliculas-scaled.jpg');"></div>

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
                    <div class="relative flex justify-center items-center flex-wrap pt-16 pb-16 pl-12 pr-12">
                                <div class="relative flex justify-center items-start w-80 h-96 bg-red-500 border-2 border-black rounded-2xl">
                                        <img src="{{ $marvel->thumbnail->path }}/portrait_uncanny.{{ $marvel->thumbnail->extension }}" alt="{{ $marvel->title }}" class="absolute w-48 h-56 rounded-lg overflow-hidden">
                                        <div class="absolute mt-64 w-full pl-7 pr-7 text-center h-14 hidden">
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


