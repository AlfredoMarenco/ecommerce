<div class="flex-1 relative" x-data>
    <form action="{{ route('search') }}">
        <x-jet-input name="name" wire:model="search" type="text" class="flex w-full"
            placeholder="¿Estas buscando algun producto?" autocomplete="off" />
        <button
            class="absolute top-0 right-0 w-12 h-full bg-pink-800 flex items-center justify-center rounded-r-md hover:bg-trueGray-700">
            <x-search size="30" color="white" />
        </button>
    </form>

    <div class="absolute w-full hidden" :class="{'hidden': !$wire.open}" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex">
                        <img class="w-16 h-12 object-cover" src="{{ Storage::url($product->images->first()->url) }}">
                        <div class="ml-4 text-trueGray-700 ">
                            <p class="text-lg font-semibold leading-5">Nombre: {{ $product->name }}</p>
                            <p class="text-sm">Categoria: {{ $product->subcategory->category->name }}</p>
                        </div>
                    </a>
                @empty
                    <div class="flex">
                        <div class="ml-4 text-trueGray-700 ">
                            <p class="text-md leading-5">No existen resultados para la busqueda : {{ $search }}
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
