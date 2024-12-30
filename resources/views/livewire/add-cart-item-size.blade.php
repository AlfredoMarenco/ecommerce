<div x-data>
    <div class="mb-2">
        <p class="text-xl text-trueGray-700">Talla:</p>
        <select wire:model="size_id" class="form-control w-full">
            <option value="" selected disabled>-Seleccione una talla-</option>

            @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <p class="text-xl text-trueGray-700">Color:</p>

        <select wire:model="color_id" class="form-control w-full">
            <option value="" selected disabled>-Seleccione un color-</option>
            @foreach ($colors as $color)
                <option value="{{ $color->id }}">{{ __($color->name) }}</option>
            @endforeach
        </select>
    </div>
    <p class="text-trueGray-700 mb-4">
        <span class="font-semibold text-lg">Stock disponible:</span>
        @if ($quantity)
            {{ $quantity }}
        @else
            {{ $product->stock }}
        @endif
    </p>
    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" wire:click='decrement'>
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-trueGray-700">{{ $qty }}</span>
            <x-jet-secondary-button disabled x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
                wire:target="increment" wire:click='increment'>
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-button class="w-full" disabled x-bind:disabled="!$wire.quantity" wire:click="addItem"
                wire:loading.attr="disabled" wire:target="addItem">Agregar a carrito de compras</x-button>
        </div>
    </div>

    {{-- <div class="mt-10">
        <div class="flex items-center justify-between">
            <h3 class="text-sm font-medium text-gray-900">Tamaño</h3>
        </div>
        <fieldset aria-label="Choose a size" class="mt-4">
            <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                <!-- Active: "ring-2 ring-indigo-500" -->
                <label
                    class="group relative flex cursor-not-allowed items-center justify-center rounded-md border bg-gray-50 px-4 py-3 text-sm font-medium uppercase text-gray-200 hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="XXS" disabled class="sr-only">
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
                <label
                    class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="XS" class="sr-only">
                    <span>70 ml</span>
                    <span class="pointer-events-none absolute -inset-px rounded-md"
                        aria-hidden="true"></span>
                </label>
                <label
                    class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="S" class="sr-only">
                    <span>100 ml</span>
                    <span class="pointer-events-none absolute -inset-px rounded-md"
                        aria-hidden="true"></span>
                </label>
            </div>
        </fieldset>
    </div> --}}
</div>
