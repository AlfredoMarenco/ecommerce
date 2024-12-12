<div wire:init='loadProducts'>
    <div class="gap-10 items-center">
        <div>
            @if (count($products))
           <div class="container">
            <div class="glider-contain">
                <ul class="glider-{{ $category->id }} pt-3">
                    @foreach ($products as $product)
                        <li class="rounded-lg {{ $loop->last ? '' : 'sm:mr-4' }}">
                            <article>
                                <figure class="contenedor-imagen ">
                                    @if ($product->images)
                                        <img class="md:h-48 md:w-full object-cover"
                                            src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                    @else
                                        <img class="md:h-48 md:w-full object-cover object-center"
                                            src="https://images.pexels.com/photos/230544/pexels-photo-230544.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                            alt="">
                                    @endif
                                </figure>
                                <div class="pt-3">
                                    <div class="grid grid-cols-4 gap-6">
                                        <div class="grid col-span-3 ">
                                            <h1 class="titulo-card text-lg font-semibold">
                                                <a href="{{ route('products.show', $product) }}" ">
                                                    {{ Str::limit($product->name, 20, '...') }}
                                                </a> <br>
                                                {{-- <span class="largos text-sm">20 x largos</span> --}}
                                            </h1>
                                            <p class="text-gray-500 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, id!</p>
                                        </div>
                                        <span class="precio">$300.00</span>
                                    </div>
                                    {{-- <a class="font-bold text-trueGray-700">US$ {{ $product->price }}</a> --}}
                                    <a href="{{ route('products.show', $product) }}" type="button" class="mt-4 text-sm ver-producto">
                                        Agregar al carrito</a>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>

                {{-- <button aria-label="Previous" class="glider-prev h-3">«</button>
                <button aria-label="Next" class="glider-next">»</button>
                <div role="tablist" class="dots"></div> --}}
            </div>
           </div>
        @else
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            <i class="fas fa-spinner animate-spin ease duration-300 text-6xl text-indigo-600"></i>
        </div>
        @endif
        </div>
    </div>


</div>
