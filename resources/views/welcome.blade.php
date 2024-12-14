<x-app-layout>
    <header class="py-2 bgcabecera" style="background-image: url({{asset('img/header-herbory.png')}})">
        <div class="container mx-auto max-w-7xl sm:px-6 lg:px-8 cabecera">
            <div class="contenido-cabecera text-center">
                <span class="text-white uppercase text-center">encuentra verdaderos</span>
                <h1 class="text-white lg:text-7xl md:text-3xl sm:text-sm pb-3 pt-3">Productos <br> terapéuticos
                </h1>
                <span class="text-white">para el cuidado de tu salud y belleza, abraza tu lado natural. <br>Cámbiate a Herbory.</span>
                <div class="w-11/12 mt-3">
                    <div class="flex-1 hidden md:block">
                        @livewire('search')
                    </div>
                </div>

            </div>
        </div>
    </header>

    <section class="titular-producto container py-10">
        <p class="text-center text-xl">Productos terapéuticos naturales para cuidado de la salud, <br>
            belleza y el medio ambiente.</p>
    </section>
    <div>
        {{-- Glider con imagen destacada --}}
        @forelse ($categories as $category)
            @if ($category->name == 'Más vistos')
                <section class="mb-6 ">
                    @livewire('category-products-alt', ['category' => $category])
                    <div class="flex items-center mb-2 pl-10 pt-8 text-center categoria">
                        {{--  <h1 class="text-3xl uppercase text-left font-semibold text-gray-700">
                             {{ $category->name }}
                         </h1> --}}
                         <a href="{{ route('categories.show', $category) }}"
                             class="ver-mas-btn">Ver
                             más</a>
                     </div>
                </section>
            @endif
        @empty
            <section class="mb-6">
                <p>No hay productos en la base de datos</p>
            </section>
        @endforelse

        {{-- categorias herbory --}}
        <x-categorias-acceso/>


        {{-- end categorias herbory --}}
        <section class="titular-producto container py-10">
            <p class="text-center text-xl">Los favoritos de nuestros clientes</p>
        </section>
        {{-- Glider subcategorias --}}
        @forelse ($categories as $category)
            @if ($category->name == 'Favoritos')
                <section class="mb-6 mt-6">
                    <div class="flex items-center mb-2">
                        <h1 class="text-lg uppercase font-semibold text-gray-700">
                            {{ $category->name }}
                        </h1>

                        <a href="{{ route('categories.show', $category) }}"
                            class="text-trueGray-700 ml-2 font-semibold hover:text-trueGray-500 hover:underline">Ver
                            más</a>
                    </div>
                    @livewire('category-subproducts', ['category' => $category, 'subcategory' => 'CREMAS'])
                </section>
            @endif
        @empty
            <section class="mb-6">
                <p>No hay productos en la base de datos</p>
            </section>
        @endforelse
    </div>
    <section class="promo">
        <div class="container">
            <div class="contenido">
                <h3 class="text-white text-2xl">10% de descuento en todos nuestros productos</h3>
                <a href="">Ver productos</a>
            </div>
        </div>
    </section>
    <div>

        <section class="caracteristicas pt-10">
            <div class="container">
                <div class="grid grid-cols-8">
                    <div class="col-span-2 beneficios">
                        <img src="{{asset('img/Recurso-1.svg')}}"  class="icono text-center">
                        <h1 class="beneficio pt-3">100% Naturales</h1>
                        <p class="descripcion text-center">Nuestros ingredientes son cultivados libres de pesticidas</p>
                    </div>
                    <div class="col-span-2 beneficios">
                        <img src="{{asset('img/Recurso-1.svg')}}"  class="icono text-center">
                        <h1 class="beneficio pt-3">100% Naturales</h1>
                        <p class="descripcion text-center">Nuestros ingredientes son cultivados libres de pesticidas</p>
                    </div>
                    <div class="col-span-2 beneficios">
                        <img src="{{asset('img/Recurso-1.svg')}}"  class="icono text-center">
                        <h1 class="beneficio pt-3">100% Naturales</h1>
                        <p class="descripcion text-center">Nuestros ingredientes son cultivados libres de pesticidas</p>
                    </div>
                    <div class="col-span-2 beneficios">
                        <img src="{{asset('img/Recurso-1.svg')}}"  class="icono text-center">
                        <h1 class="beneficio pt-3">100% Naturales</h1>
                        <p class="descripcion text-center">Nuestros ingredientes son cultivados libres de pesticidas</p>
                    </div>

                </div>
            </div>
        </section>

        {{-- Glider con imagen destacada --}}
        @forelse ($categories as $category)
            <section>
                @if ($category->name == 'Computación')
                    @livewire('category-products', ['category' => $category])
                @endif
            </section>
        @empty
            <section class="mb-6">
                <p>No hay productos en la base de datos</p>
            </section>
        @endforelse

        <div></div>

        {{-- Glider subcategorias --}}
        @forelse ($categories as $category)
            @if ($category->name == '')
                <section class="mb-6">
                    <div class="flex items-center mb-2">
                        <h1 class="text-lg uppercase font-semibold text-gray-700">
                            {{ $category->name }}
                        </h1>

                        <a href="{{ route('categories.show', $category) }}"
                            class="text-trueGray-700 ml-2 font-semibold hover:text-trueGray-500 hover:underline">Ver
                            más</a>
                    </div>
                    @livewire('category-subproducts', ['category' => $category, 'subcategory' => 'Marmoles'])
                </section>
            @endif
        @empty
            <section class="mb-6">
                <p>No hay productos en la base de datos</p>
            </section>
        @endforelse
    </div>

    <section class="reviews">
        <div class="container">
            <div class="reviews__titulo">
                <h3 class="uppercase text-center">lo que dicen de nosotros</h3>
                <h1 class="text-center">Naturalmente confiables</h1>
            </div>
            <div class="reviews__contenido">
                <div class="grid grid-cols-3 gap-10">
                    <div class="grid-span-1">
                        <span>"</span>
                        <p>Aromas deliciosos, productos qu conservan su calidad con el paso del tiempo y que cuidan el medio mbiente.</p>
                        <p class="persona">Diana Algo</p>
                    </div>
                    <div class="grid-span-1">
                        <span>"</span>
                        <p>Aromas deliciosos, productos qu conservan su calidad con el paso del tiempo y que cuidan el medio mbiente.</p>
                        <p class="persona">Diana Algo</p>
                    </div>
                    <div class="grid-span-1">
                        <span>"</span>
                        <p>Aromas deliciosos, productos qu conservan su calidad con el paso del tiempo y que cuidan el medio mbiente.</p>
                        <p class="persona">Diana Algo</p>
                    </div>
                </div>

            </div>
        </div>
    </section>




    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 5,
                            }
                        },
                    ]
                });
            });

            Livewire.on('glider2', function(id) {
                new Glider(document.querySelector('.glider2-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider2-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider2-' + id + '~ .glider2-prev',
                        next: '.glider2-' + id + '~ .glider2-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 5,
                            }
                        },
                    ]
                });
            });
        </script>
    @endpush

</x-app-layout>
