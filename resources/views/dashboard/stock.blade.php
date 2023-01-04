<x-app-layout>
    <x-slot name="header">
        <x-dashboard-links />

    </x-slot>

    {{-- TODO: add no product alert --}}
    <div class="mx-7 py-4 space-y-8">
        <form action="{{ route('dashboard.stock') }}" method="post">
            @csrf
            <div class="flex justify-start space-x-3 items-end">
                <!-- stock -->
                <div class="w-1/6">
                    <x-input-label for="stock" :value="__('Stock Level')" />
                    <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock"
                        value="{{ request()->stock ?? 0 }}" required autofocus />
                    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                </div>
                <!-- brand -->
                <x-primary-button>
                    {{ __('Search') }}
                </x-primary-button>
            </div>
        </form>
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-gray-800">
                    @foreach (['Category', 'Brand', 'Price', ''] as $item)
                        <th scope="col" class="text-white font-medium px-4 py-2 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @isset($products)
                    @forelse ($products as $product)
                        <tr class="bg-white border-b">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                {{ $product->category }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                {{ $product->brand }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                {{ $product->price }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"
                                class=" text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                no product has the requested stock level
                            </td>
                        </tr>
                    @endforelse
                @endisset

            </tbody>
        </table>
    </div>
</x-app-layout>
