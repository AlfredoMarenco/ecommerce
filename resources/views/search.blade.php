<x-app-layout>
    <div class="container py-8">
        <ul>
            @forelse ($products as $product)
                <x-product-list :product="$product" />
            @empty
                <li class="bg-white rounded-lg shadow-xl">
                    <div class="p-4 text-center">
                        <p class="text-gray-500 font-light">
                            No se encontro resultados para tu busqueda
                        </p>
                    </div>
                </li>
            @endforelse
        </ul>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
