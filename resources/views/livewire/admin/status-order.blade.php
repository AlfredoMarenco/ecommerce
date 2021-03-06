<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex bg-white rounded-lg shadow-lg px-12 py-8 mb-6 items-center">
        <div class="relative">
            <div
                class="{{ $order->status >= 2 && $order->status != 5 ? 'bg-blue-400' : 'bg-trueGray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                <i class="fas fa-check text-white"></i>
            </div>
            <div class="absolute -left-1.5 mt-0.5">
                <p>Recibido</p>
            </div>
        </div>
        <div
            class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-blue-400' : 'bg-trueGray-400' }} h-1 flex-1 mx-2">
        </div>
        <div class="relative">
            <div
                class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-blue-400' : 'bg-trueGray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                <i class="fas fa-truck text-white"></i>
            </div>
            <div class="absolute -left-1 mt-0.5">
                <p>Enviado</p>
            </div>
        </div>
        <div
            class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-trueGray-400' }} h-1 flex-1 mx-2">
        </div>
        <div class="relative">
            <div
                class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-trueGray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                <i class="fas fa-check text-white"></i>
            </div>

            <div class="absolute -left-2 mt-0.5">
                <p>Entregado</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 ">
        <p class="text-trueGray-700 uppercase">
            <span class="font-semibold">Número de orden:</span> Orden-{{ $order->id }}
        </p>
        <form wire:submit.prevent="update">
            <div class="flex items-center space-x-3 mt-2">
                <x-jet-label>
                    <input type="radio" name="status" value="2" class="mr-2" wire:model.defer="status">
                    RECIBIDO
                </x-jet-label>
                <x-jet-label>
                    <input type="radio" name="status" value="3" class="mr-2" wire:model.defer="status">
                    ENVIADO
                </x-jet-label>
                <x-jet-label>
                    <input type="radio" name="status" value="4" class="mr-2" wire:model.defer="status">
                    ENTREGADO
                </x-jet-label>
                <x-jet-label>
                    <input type="radio" name="status" value="5" class="mr-2" wire:model.defer="status">
                    ANULADO
                </x-jet-label>
            </div>
            <div class="flex justify-end items-center mt-2">
                <x-jet-action-message on="saved" class="mr-3">
                    Estatus cambiado
                </x-jet-action-message>
                <x-jet-button>
                    Actualizar
                </x-jet-button>
            </div>
        </form>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-lg font-semibold uppercase">
                    Envío
                </p>
                @if ($order->shipping_type == 1)
                    <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                    <p class="text-sm">Calle falsa 123</p>
                @else
                    <p class="text-sm">Los productos serán enviados a</p>
                    <p class="text-sm">{{ $envio->address }}</p>
                    <p>{{ $envio->department }} - {{ $envio->city }} -
                        {{ $envio->district }}</p>
                @endif
            </div>
            <div>
                <p class="text-lg font-semibold uppercase">
                    Datos de contacto
                </p>
                <p class="text-sm">
                    Persona que recibirá el producto: {{ $order->contact }}
                </p>
                <p class="text-sm">
                    Telefono de contacto: {{ $order->phone }}
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 text-trueGray-700 mb-6">
        <p class="text-xl font-semibold mb-4">Resumen</p>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Precio</th>
                    <th>Cant</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($items as $product)
                    <tr>
                        <td>
                            <div class="flex">
                                <img src="{{ $product->options->image }}" alt="" class="h-15 w-20 object-cover mr-4">
                                <article>
                                    <h1 class="font-bold">{{ $product->name }}</h1>
                                    <div class="flex text-xs">
                                        @isset($product->options->color)
                                            Color: {{ __($product->options->color) }}
                                        @endisset

                                        @isset($product->options->size)
                                            Talla: {{ __($product->options->size) }}
                                        @endisset
                                    </div>
                                </article>
                            </div>
                        </td>
                        <td class="text-center">
                            {{ $product->price }} USD
                        </td>
                        <td class="text-center">
                            {{ $product->qty }}
                        </td>
                        <td class="text-center">
                            {{ $product->price * $product->qty }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
