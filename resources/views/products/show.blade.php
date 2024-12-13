<x-app-layout>
    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    theme: {
      extend: {
        gridTemplateRows: {
          '[auto,auto,1fr]': 'auto auto 1fr',
        },
      },
    },
  }
  ```
-->
    <div class="bg-white">
        <div class="pt-6">


            <!-- Image gallery -->

            @foreach ($product->images as $image)
                <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">

                    <img src="{{ Storage::url($image->url) }}"
                        alt="Two each of gray, white, and black shirts laying flat."
                        class="hidden aspect-[3/4] size-full rounded-lg object-cover lg:block">
                    <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg"
                            alt="Model wearing plain black basic tee."
                            class="aspect-[3/2] size-full rounded-lg object-cover">
                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg"
                            alt="Model wearing plain gray basic tee."
                            class="aspect-[3/2] size-full rounded-lg object-cover">
                    </div>
                    <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-featured-product-shot.jpg"
                        alt="Model wearing plain white basic tee."
                        class="aspect-[4/5] size-full object-cover sm:rounded-lg lg:aspect-[3/4]">

                </div>
            @endforeach
            <!-- Product info -->
            <div
                class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto_auto_1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                <div class="  lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <h1 class="v-cruzada__titulo text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $product->name }}</h1>
                </div>

                <!-- Options -->
                <div class="mt-4 lg:row-span-3 lg:mt-0">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl tracking-tight text-gray-900">$192</p>


                    <form class="mt-10">


                        <!-- Sizes -->
                        <div class="mt-10">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-medium text-gray-900">Tamaño</h3>
                            </div>

                            <fieldset aria-label="Choose a size" class="mt-4">
                                <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                    <label
                                        class="group relative flex cursor-not-allowed items-center justify-center rounded-md border bg-gray-50 px-4 py-3 text-sm font-medium uppercase text-gray-200 hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="XXS" disabled
                                            class="sr-only">
                                        <span>20 ml</span>
                                        <span aria-hidden="true"
                                            class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                                            <svg class="absolute inset-0 size-full stroke-2 text-gray-200"
                                                viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                                <line x1="0" y1="100" x2="100" y2="0"
                                                    vector-effect="non-scaling-stroke" />
                                            </svg>
                                        </span>
                                    </label>
                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                    <label
                                        class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="XS" class="sr-only">
                                        <span>70 ml</span>
                                        <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                            aria-hidden="true"></span>
                                    </label>
                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                    <label
                                        class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="S" class="sr-only">
                                        <span>100 ml</span>
                                        <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                            aria-hidden="true"></span>
                                    </label>
                                    <!-- Active: "ring-2 ring-indigo-500" -->

                                </div>
                            </fieldset>
                        </div>

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

                    </form>
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
        </div>

        <div class="container py-8 contenedor-producto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

                <div>

                    <div class="flexslider">
                        <ul class="slides">
                            @foreach ($product->images as $image)
                                <li data-thumb="{{ Storage::url($image->url) }}">
                                    <img src="{{ Storage::url($image->url) }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>



                </div>

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
                    <div class="bg-white rounded-lg shadow-lg mb-6">
                        <div class="flex items-center p-4">
                            <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-600">
                                <i class="fas fa-truck text-sm text-white"></i>
                            </span>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-greenLime-600">Enviamos a todo México</p>
                                <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}.</p>
                            </div>
                        </div>
                    </div>
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
