<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}

        <div class="flex justify-between">
            <div class="font-bold text-lg">
                {{-- TODO: sum quantity instead --}}
                {{-- @isset($products->sum('attributes_count'))
                    count : {{ $products->sum('attributes_count') }}
                @endisset --}}
                {{-- @empty($products->sum('attributes_count'))

                @else
                    count : {{ $products->sum('attributes_count') }}
                @endempty --}}
            </div>
            <div class="flex space-x-4">
                <a class="py-2 px-4 bg-indigo-500 text-white rounded"
                    href="{{ route('sale.attribute.create', compact('product')) }}">add</a>

            </div>
        </div>
    </x-slot>


    <div class="mx-7 py-4">
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-gray-800">
                    @foreach (['Category', 'Brand', 'Quantity', 'Price'] as $item)
                        <th scope="col" class="text-white font-medium px-4 py-2 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $product->category }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $product->brand }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $product->attributes->count() }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $product->price }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>


    {{-- TODO: make description column width dynamic --}}
    <div class="py-4 w-2/3 mx-auto">
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-gray-800">
                    @foreach (['Color', 'Size', 'Description', ''] as $item)
                        <th scope="col" class="text-white font-medium px-2 py-1 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($product->attributes as $attribute)
                    <tr class="bg-white border-b">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $attribute->color }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $attribute->size }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $attribute->description }}
                        </td>
                        <td>
                            <a href="{{ route('sale.attribute.edit', compact('product', 'attribute')) }}"
                                class="text-indigo-500 text-lg">edit</a>

                            <form style="display: inline"
                                action="{{ route('sale.attribute.destroy', compact('product', 'attribute')) }}"
                                method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" class="text-red-500 text-lg" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-app-layout>
