@extends('layouts.app')
        @section('content')

                <div class=" relative h-64 bg-cover bg-center mb-10" style="background-image: url('https://www.todofondos.net/wp-content/uploads/fondo-de-pantalla-marvel-studios-hd-4k-peliculas-scaled.jpg');"></div>

                <!-- Mostrado de los comics -->

                @foreach ($comics as $marvel)
                    <div class="relative flex justify-center items-center flex-wrap pt-16 pb-16 pl-14 pr-14">
                                <div class="relative group flex justify-center items-start w-96 h-96 duration-700 hover:h-600 bg-red-500 border-2 border-white rounded-2xl shadow-lg shadow-slate-100 ">
                                        <img src="{{ $marvel->thumbnail->path }}/portrait_uncanny.{{ $marvel->thumbnail->extension }}" alt="{{ $marvel->title }}" class="absolute w-48 h-56 rounded-lg  overflow-hidden transform group-hover:-translate-y-24 duration-700">
                                        <div class="absolute mt-64 w-full pl-7 pr-7 text-center h-16 overflow-hidden duration-700 group-hover:top-2 group-hover:h-96">
                                            <h2 class="text-white text-xl mb-1">{{ $marvel->title }}</h2>
                                            @foreach ($marvel->creators->items as $creator)
                                            <!-- Muestra el nombre del creador -->
                                            <h3 hidden>Nombre del creador: {{ $creator->name }}</h3>
                                            @endforeach
                                            <p class="text-slate-100 mb-3" class="mb-4">
                                                @if ($marvel->description)
                                                    {{ $marvel->description }}
                                                @else
                                                    Descripción no disponible
                                                @endif
                                            </p>
                                            <!-- Agrega un enlace al botón "Ver Detalles" -->
                                            <a href="{{ route('home.show', ['home' => $marvel->id]) }}" class="border-2 border-slate-100 bg-gray-600 text-slate-100 pt-3 pb-3 pl-5 pr-5 rounded-2xl mt-5 hover:bg-slate-100 hover:text-red-700 hover:border-red-700">Ver Detalles</a>
                                        </div>
                                </div>
                    </div>
                @endforeach

                <div class="bg-red-700" >
                    <ul class="place-content-between flex p-4">
                            <li>
                            @if ($page > 1)
                            <a href="{{ route('home.index', ['page' => $page - 1]) }}" class="text-xl hover:text-gray-100"><i class="fa-solid fa-arrow-left"></i>Pagina anterior</a>
                            @endif
                            </li>
                            <li>
                                <a href="{{ route('home.index', ['page' => $page + 1]) }}" class="text-xl hover:text-gray-100">Siguiente pagina<i class="fa-solid fa-arrow-right"></i></a>
                            </li>
                    </ul>
                </div>

                <footer class="w-full bg-gray-600">
                    <div class="w-full max-w-7xl m-auto grid grid-cols-3 gap-12 pb-12 pt-12">
                        <div>
                            <figure class="w-full h-full flex justify-center items-center">
                                <a href="#">
                                    <img src="https://i.pinimg.com/originals/8e/e9/c1/8ee9c1e8083ebe9babe7208c1f46daca.png" alt="Logo de Marvel" class="w-64">
                                </a>
                            </figure>
                        </div>
                        <div>
                            <h2 class=" text-gray-50 mb-6 text-sm">SOBRE NOSOTROS</h2>
                            <p class="text-gray-50 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, ipsa?</p>
                            <p class="text-gray-50 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, ipsa?</p>
                        </div>
                        <div>
                            <h2 class=" text-gray-50 mb-6 text-sm">SIGUENOS</h2>
                            <div class="red-social">
                                <a href="#" class="fa fa-facebook inline-block w-11 h-11 leading-10 text-slate-100 mr-3 text-center hover:text-red-700"></a>
                                <a href="#" class="fa fa-instagram inline-block w-11 h-11 leading-10 text-slate-100 mr-3 text-center hover:text-red-700"></a>
                                <a href="#" class="fa fa-twitter inline-block w-11 h-11 leading-10 text-slate-100 mr-3 text-center hover:text-red-700"></a>
                                <a href="#" class="fa fa-youtube inline-block w-11 h-11 leading-10 text-slate-100 mr-3 text-center hover:text-red-700"></a>
                            </div>
                        </div>
                    </div>
                    <div class=" bg-gray-50 pt-4 pb-4 pl-2 pr-2 text-center text-red-700">
                        <small>&copy; 2023 <b>MARVEL</b> - Todos los Derechos Reservados.</small>
                    </div>
                </footer>
        @endsection


