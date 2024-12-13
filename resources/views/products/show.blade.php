<x-app-layout>

    <div class="container py-8 contenedor-producto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            {{-- Column 1 --}}
            <div>
                {{-- FlexSlider product --}}
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>


                @livewire('products-reviews', ['product' => $product], key('products-reviews'.$product->id))
            </div>
            {{-- Column 2 --}}
            <div class="show__product">
                <h1 class="text-trueGray-700 font-bold text-3xl uppercase">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="mt-2 text-trueGray-700">Marca: <a class="underline capitalize hover:text-trueGray-900"
                            href="">{{ $product->brand->name }}</a> </p>


                </div>
                <p class="text-2xl font-semibold text-trueGray-700 my-4">
                    <div class="mt-3 mb-3 text-trueGray-700">
                        <h2 class="font-bold text-lg">Descripción</h2>
                        <p>{!! $product->description !!}</p>
                    </div>
                </p>
                {{-- <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="flex items-center p-4">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-600">Se hace envios a todo México</p>
                            <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}.</p>
                        </div>
                    </div>
                </div> --}}
                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif ($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif
            </div>
        </div>
        <div class="v-cruzada">
            <div class="container">
                <h1 class="v-cruzada__titulo">Quizá te pueda interesar</h1>
                <div class="v-cruzada__productos">
                    
                </div>
            </div>
        </div>
    </div>



    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush

</x-app-layout>
