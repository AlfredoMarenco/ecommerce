<x-app-layout>
    <header class="py-2 bgcabecera">
        <div class="container mx-auto max-w-7xl sm:px-6 lg:px-8 cabecera">
            <div class="contenido">
                <h1 class="text-white uppercase lg:text-3xl md:text-3xl sm:text-sm ">La Armonía Perfecta Entre Piedra
                    Natural <br> y Diseño de Vanguardia
                </h1>
                <div class="w-11/12 mt-3">
                    <div class="flex-1 hidden md:block">
                        @livewire('search')
                    </div>
                </div>

            </div>
        </div>
    </header>
    <section class="nosotros py-10">
        <div class="container nosotros__contenido">
            <p class="flex text-center">Bazar de Canteras es una empresa dedicada a la distribución de piedras de
                cantera, enfocada en ofrecer materiales excepcionales para remodelaciones de casas y negocios. Con una
                amplia selección de piedras naturales, nuestros productos aportan un toque distintivo, ya sea para crear
                ambientes clásicos, modernos o rústicos. Son perfectos para pisos, fachadas, revestimientos y detalles
                decorativos.</p>
        </div>
        <div class="grid grid-cols-1 gap-10 somos-riqueza py-8 items-center lg:grid lg:grid-cols-2">
            <div class="somos-riqueza__img pl-0">
                <img src="{{ asset('img/2.jpg') }}" class="" alt="">
            </div>
            <div class="somos-riqueza__txt inline-block align-middle lg:pr-8 p-8 ">
                <h1 class="uppercase text-2xl">Somos Riqueza <span class="natural">Natural</span></h1>
                <p>Nuestras piedras de cantera mexicana son una fusión sublime entre arte y naturaleza, transformando
                    cualquier espacio en una obra maestra. Cada pieza, tallada por siglos de historia, evoca la esencia
                    ancestral de México. Con texturas únicas y formas que narran la riqueza cultural de nuestra tierra,
                    ofrecemos materiales que no solo construyen, sino que embellecen y conectan con el alma de tus
                    proyectos.</p>
            </div>
        </div>
    </section>
    <section class="container py-10">
        <p class="text-center">Somos una propuesta en piedras naturales para la industria de la construcción e
            interiorismo,<br> ofreciendo
            una amplia variedad y calidad en nuestros productos</p>
    </section>
    <div>
        {{-- Glider con imagen destacada --}}
        @forelse ($categories as $category)
            @if ($category->name == 'Lajas')
                <section class="mb-6 ">
                    <div class="flex items-center mb-2 pl-10 categoria">
                        <h1 class="text-3xl uppercase font-semibold text-gray-700">
                            {{ $category->name }} VEINTE <span class="catego__descripcion">X LARGOS</span>
                        </h1>
                        <a href="{{ route('categories.show', $category) }}"
                            class="text-trueGray-700 ml-2 font-semibold hover:text-trueGray-500 hover:underline">Ver
                            más</a>
                    </div>
                    @livewire('category-products-alt', ['category' => $category])
                </section>
            @endif
        @empty
            <section class="mb-6">
                <p>No hay productos en la base de datos</p>
            </section>
        @endforelse

        {{-- Glider subcategorias --}}
        @forelse ($categories as $category)
            @if ($category->name == 'Lajas')
                <section class="mb-6">
                    <div class="flex items-center mb-2">
                        <h1 class="text-lg uppercase font-semibold text-gray-700">
                            {{ $category->name }}
                        </h1>

                        <a href="{{ route('categories.show', $category) }}"
                            class="text-trueGray-700 ml-2 font-semibold hover:text-trueGray-500 hover:underline">Ver
                            más</a>
                    </div>
                    @livewire('category-subproducts', ['category' => $category, 'subcategory' => 'Lajas de diez'])
                </section>
            @endif
        @empty
            <section class="mb-6">
                <p>No hay productos en la base de datos</p>
            </section>
        @endforelse
    </div>
    <div>
        {{-- Glider con imagen destacada --}}
        @forelse ($categories as $category)
            <section class="pb-7 pt-7">
                @if ($category->name == 'Canteras')
                    <div class=" items-center mb-2 pl-10 categoria">
                        <div class="titular-canteras text-center pb-5">
                            <h1 class="text-3xl uppercase font-semibold text-gray-700">
                                {{ $category->name }}
                            </h1>
                            <p class="c-descripcion">Descubre nuestra selección de piedras naturales ideales <br> para
                                revestimientos, fachadas y decoraciones.</p>
                            <a href="{{ route('categories.show', $category) }}"
                                class="text-trueGray-700 c-descripcion ml-2 font-light hover:text-trueGray-500 hover:underline">Ver
                                más</a>
                        </div>

                    </div>
                    @livewire('category-products', ['category' => $category])
                @endif
            </section>
        @empty
            <section class="mb-6">
                <p>No hay productos en la base de datos</p>
            </section>
        @endforelse

        {{-- Glider subcategorias --}}
        @forelse ($categories as $category)
            @if ($category->name == 'Marmoles')
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

    <section class="galeria">
        <div class="container galeria__contenido">
            <h1 class="titulo-galeria uppercase lg:text-3xl md:text-3xl sm:text-sm">Proyectos en colaboración <br> con
                bazar de canteras</h1>
            <div class="imagenes-galeria justify-center align-middle">
                <img src="{{ asset('img/3.jpg') }}" alt="">
            </div>
        </div>
    </section>

    <section class="clientes">
        <div class="container clientes__contenido">
            <h1 class="lg:text-2xl md:text-2xl sm:text-sm">ELLOS HAN CONFIADO EN NOSOTROS</h1>
            <div class="grid grid-cols-8 gap-6">
                <div class="col-span-2"><img src="{{ asset('img/logos.png') }}" alt=""></div>
                <div class="col-span-2"><img src="{{ asset('img/logos.png') }}" alt=""></div>
                <div class="col-span-2"><img src="{{ asset('img/logos.png') }}" alt=""></div>
                <div class="col-span-2"><img src="{{ asset('img/logos.png') }}" alt=""></div>
            </div>
        </div>
    </section>

    <section class="nosotros py-10">
        <div class="grid grid-cols-6 gap-14 somos-riqueza py-8 ">
            <div class="somos-riqueza__img pl-0 lg:col-span-3 md:col-span-6 sm:col-span-6">
                <img src="{{ asset('img/negocios.jpg') }}" class="" alt="">
            </div>
            <div
                class="somos-riqueza__txt col-span-3 inline-block align-middle lg:col-span-3 md:col-span-6 sm:col-span-6">
                <h1 class="uppercase text-2xl">PROYECTOS EMPRESARIALES</h1>
                <p>Nuestras piedras han transformado hogares y negocios, aportando estilo y durabilidad a cada espacio.
                    Desde muros revestidos hasta pisos elegantes, nuestros materiales se adaptan a cualquier proyecto de
                    remodelación y diseño interior de alta calidad.</p>
                <button type="button"
                    class="my-3 rounded-md bg-pink-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Recibe
                    atención personalizada</button>
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
                                slidesToShow: 3,
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
