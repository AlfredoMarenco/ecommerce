<x-app-layout>
    <div class="bg-white">
        <div class="pt-6">
            <!-- Image gallery -->
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                @foreach ($product->images as $image)
                    @if ($loop->iteration == 1)
                        <img src="{{ Storage::url($image->url) }}"
                            alt="Two each of gray, white, and black shirts laying flat."
                            class="hidden aspect-[3/4] size-full rounded-lg object-cover lg:block">
                        <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                    @endif
                @endforeach

                @foreach ($product->images as $image)
                    @if ($loop->iteration == 2)
                        <img src="{{ Storage::url($image->url) }}" alt="Model wearing plain black basic tee."
                            class="aspect-[3/2] size-full rounded-lg object-cover">
                    @endif
                @endforeach

                @foreach ($product->images as $image)
                    @if ($loop->iteration == 3)
                        <img src="{{ Storage::url($image->url) }}" alt="Model wearing plain gray basic tee."
                            class="aspect-[3/2] size-full rounded-lg object-cover">
                    @endif
                @endforeach
            </div>
            @foreach ($product->images as $image)
                @if ($loop->iteration == 4)
                    <img src="{{ Storage::url($image->url) }}"
                        alt="Model wearing plain white basic tee."
                        class="aspect-[4/5] size-full object-cover sm:rounded-lg lg:aspect-[3/4]">
                @endif
            @endforeach
        </div>
        <!-- Product info -->
        <div
            class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto_auto_1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
            <div class="  lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="v-cruzada__titulo text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                    {{ $product->name }}</h1>
            </div>
            <!-- Options -->
            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl tracking-tight text-gray-900">${{ $product->price }}</p>
                    {{-- stock, btn, add --}}
                    <div class="show__product pt-5">
                        @if ($product->subcategory->size)
                            @livewire('add-cart-item-size', ['product' => $product])
                        @elseif ($product->subcategory->color)
                            @livewire('add-cart-item-color', ['product' => $product])
                        @else
                            @livewire('add-cart-item', ['product' => $product])
                        @endif
                    </div>
                    {{-- end stock, btn --}}
            </div>
            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                <!-- Description and details -->
                <div>
                    <h3 class="sr-only">Description</h3>
                    <div class="space-y-6">
                        <p class="text-base text-gray-900">{!! $product->description !!}</p>
                    </div>
                </div>
                @livewire('products-reviews', ['product' => $product], key('products-reviews' . $product->id))
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
