<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-end">
            <x-link class="text-white bg-indigo-500" :route="route('sale.attribute.add', $sale)">Add Product</x-link>
        </div>
    </x-slot>


    <div class="mx-7 py-4 space-y-5">
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-gray-800">
                    @foreach (['Client', 'Amount', 'Products', 'Date (m-d)', 'status', ''] as $item)
                        <th scope="col" class="text-white font-medium px-4 py-2 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $sale->client }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $sale->attributes->sum('price') }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $sale->attributes->count() }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $sale->created_at->format('m-d') }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $sale->status }}
                    </td>
                    <td class="space-x-5">
                        <a href="{{ route('sale.edit', $sale) }}">edit</a>
                    </td>
                </tr>

            </tbody>
        </table>
        @isset($sale->note)
            <div class="text-center bg-white p-4 rounded-lg space-y-3">
                <h4 class="text-lg text-indigo-500">Note</h4>
                <p>{{ $sale->note }}</p>
            </div>
        @endisset
    </div>



    {{-- TODO: make description column width dynamic --}}
    <div class="py-4 w-2/3 mx-auto">
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-gray-800">
                    @foreach (['Category', 'Brand', 'Size', 'Price', ''] as $item)
                        <th scope="col" class="text-white font-medium px-2 py-1 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{-- <tr class="bg-white border-b">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">

                    </td> --}}
                @forelse ($sale->attributes as $attribute)
                    <tr class="bg-white border-b">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $attribute->product->category }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $attribute->product->brand }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $attribute->size }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $attribute->product->price }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            <form style="display: inline"
                                action="{{ route('sale.attribute.remove', ['sale' => $sale, 'attribute' => $attribute]) }}"
                                method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" class="text-red-500 text-lg" value="remove">
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse


            </tbody>
        </table>
    </div>
</x-app-layout>
