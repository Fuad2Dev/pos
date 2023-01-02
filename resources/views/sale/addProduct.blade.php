<x-app-layout>
    <x-slot name="header">
        <form action="{{ route('sale.product.search', $sale) }}" method="post">
            @csrf

            <div class="flex justify-between space-x-4 items-end">
                <!-- category -->
                <div class="w-1/3">
                    <x-input-label for="category" :value="__('Category')" />
                    <x-text-input id="category" class="block mt-1 w-full" type="text" name="category"
                        value="{{ isset($product) ? $product->category : '' }}" required autofocus />
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>
                <!-- brand -->
                <div class="w-1/3">
                    <x-input-label for="brand" :value="__('Brand')" />
                    <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand"
                        value="{{ isset($product) ? $product->brand : '' }}" required autofocus />
                    <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                </div>
                <x-primary-button>
                    {{ __('Search') }}
                </x-primary-button>
                <x-link class="text-white bg-red-500" :route="route('sale.show', compact('sale'))">Cancel</x-link>
            </div>
        </form>
    </x-slot>

    {{-- TODO: add no product alert --}}
    <div class="mx-7 py-4">
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-gray-800">
                    @foreach (['Color', 'Size', 'Price', 'description', ''] as $item)
                        <th scope="col" class="text-white font-medium px-4 py-2 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @isset($product)
                    @forelse ($product->attributes as $attribute)
                        <tr class="bg-white border-b">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                {{ $attribute->color }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                {{ $attribute->size }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                {{ $product->price }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                {{ $attribute->description }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                <form style="display: inline"
                                    action="{{ route('sale.product.store', compact('sale', 'attribute')) }}" method="post">
                                    @csrf
                                    <input type="submit" class="text-indigo-500 text-lg" value="add">
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"
                                class=" text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                no search results
                            </td>
                        </tr>
                    @endforelse
                @endisset

            </tbody>
        </table>
    </div>
</x-app-layout>
