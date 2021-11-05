<x-app-layout>
    @php
        // SDK de Mercado Pago
        require base_path('/vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        $shipments = new MercadoPago\Shipments();

        $shipments->cost = $order->shipping_cost;
        $shipments->mode = 'not_specified';

        $preference->shipments = $shipments;
        // Crea un ítem en la preferencia
        foreach ($items as $product) {
            $item = new MercadoPago\Item();
            $item->title = $product->name;
            $item->quantity = $product->qty;
            $item->unit_price = $product->price;

            $products[] = $item;
        }
        //Rutas de redireccion segun el caso
        $preference->back_urls = [
            'success' => route('orders.pay', $order),
            'failure' => 'http://www.tu-sitio/failure',
            'pending' => 'http://www.tu-sitio/pending',
        ];
        $preference->auto_return = 'approved';

        $preference->items = $products;
        $preference->save();
    @endphp
    <div class="container py-8">
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-trueGray-700 uppercase">
                <span class="font-semibold">Número de orden:</span> Orden-{{ $order->id }}
            </p>
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
                        <p class="text-sm">{{ $order->address }}</p>
                        <p>{{ $order->department->name }} - {{ $order->city->name }} -
                            {{ $order->district->name }}</p>
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
                                    <img src="{{ $product->options->image }}" alt=""
                                        class="h-15 w-20 object-cover mr-4">
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

        <div class="bg-white rounded-lg shadow-lg p-6 flex items-center justify-between">
            <img class="h-12"
                src="https://lh3.googleusercontent.com/proxy/KhLaArJk9MYZH5rPhOFBo5qWumWlzd9a1rj4Lcx1tD9U6YnqmC3CVw_QyUFzfW09Ay0PYOauHgcPFwVczQLpdNGNP37IGntd3PHu5hHweYxeswZeoeAHWyN8UW01JQZ-9xHZRMBhBA4dktEdqS3e0g7Hf2uiWB_UgQ"
                alt="">
            <div class="text-trueGray-700">
                <p class="font-semibold text-sm">
                    Subtotal: {{ $order->total - $order->shipping_cost }} USD
                </p>
                <p class="font-semibold text-sm">
                    Envio: {{ $order->shipping_cost }} USD
                </p>
                <p class="font-semibold uppercase text-lg">
                    Total: {{ $order->total }} USD
                </p>
                <div class="cho-container">

                </div>
            </div>
        </div>
    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
            locale: 'es-AR'
        });

        // Inicializa el checkout
        mp.checkout({
            preference: {
                id: "{{ $preference->id }}"
            },
            render: {
                container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                label: 'Pagar', // Cambia el texto del botón de pago (opcional)
            }
        });
    </script>
</x-app-layout>
