<div class="container py-12">
    <x-jet-form-section submit="storeCoupon" class="mb-6">
        <x-slot name="title">
            Crear nuevo cupon
        </x-slot>

        <x-slot name="description">
            Complete la informacion para crear el cupon
            <ul class="mt-1 text-sm text-gray-600">
                <li>1.- Porcentaje</li>
                <li>2.- Cantidad</li>
                <li>3.- Compra minima</li>
                <li>4.- Envio gratis</li>
            </ul>
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="createForm.name" type="text" placeholder="Nombre de cupon" class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Tipo" />
                <select wire:model="createForm.type"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    <option value="0" selected disabled>- Selecciona una opcion -</option>
                    <option value="1">Porcentaje</option>
                    <option value="2">Cantidad</option>
                    <option value="3">Minimo</option>
                    <option value="4">Envio Gratis</option>
                </select>
                <x-jet-input-error for="createForm.type" />
            </div>
            @if ($createForm['type'] <= 2 || $createForm['type'] == 4)
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label value="Codigo" />
                    <x-jet-input wire:model="createForm.code" type="text" placeholder="Codigo de cupon"
                        class="w-full" />
                    <x-jet-input-error for="createForm.code" />
                </div>
            @endif
            @if ($createForm['type'] <= 3 || $createForm['type'] == 4)
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label value="Valor" />
                    <x-jet-input wire:model="createForm.value" type="text" placeholder="Valor del cupon"
                        class="w-full" />
                    <x-jet-input-error for="createForm.value" />
                </div>
            @endif
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Cantidad" />
                <x-jet-input wire:model="createForm.quantity" type="text"
                    placeholder="Cantidad de cupones disponibles" class="w-full" />
                <x-jet-input-error for="createForm.quantity" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Estatus" />
                <select wire:model="createForm.status"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    <option value="0">Inactivo</option>
                    <option value="1">Activo</option>
                </select>
                <x-jet-input-error for="createForm.status" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Marca creada
            </x-jet-action-message>
            <x-jet-button>Agregar</x-jet-button>
        </x-slot>
    </x-jet-form-section>


    <x-jet-action-section>
        <x-slot name="title">
            Lista de cupones
        </x-slot>
        <x-slot name="description">
            Aqui encontrara todos los cupones creados
        </x-slot>
        <x-slot name="content">
            <table class="text-trueGray-600">
                <thead class="border-b border-trueGray-500">
                    <tr>
                        <th class="w-1/2 py-2 text-left">Nombre</th>
                        <th class="w-full py-2 text-left">Tipo</th>
                        <th class="py-2">Accion</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-trueGray-200">
                    @foreach ($coupons as $coupon)
                        <tr>
                            <td class="py-2">
                                <span class="uppercase">
                                    {{ $coupon->name }}
                                </span>
                            </td>
                            <td class="py-2">
                                <span class="uppercase">
                                    @switch($coupon->type)
                                        @case(1)
                                            Porcentaje
                                        @break
                                        @case(2)
                                            Cantidad
                                        @break
                                        @case(3)
                                            Minimo
                                        @break
                                        @case(4)
                                            Envio Gratis
                                        @break
                                        @default
                                    @endswitch
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex justify-end items-center divide-x divide-trueGray-500 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                        wire:click="edit('{{ $coupon->id }}')">Editar</a>
                                    <a wire:click="$emit('deletecoupon','{{ $coupon->id }}')"
                                        class="pl-2 hover:text-red-600 cursor-pointer">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section>
</div>
