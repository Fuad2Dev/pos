<x-app-layout>
    <x-slot name="header">
        {{-- dashhboard links --}}
        <x-dashboard-links />

    </x-slot>

    {{-- TODO: add no product alert --}}
    <div class="mx-7 py-4">
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-gray-800">
                    @foreach (['Period', 'Sales Made', 'Products Sold', 'Income'] as $item)
                        <th scope="col" class="text-white font-medium px-4 py-2 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @foreach ($summary as $period => $sales)
                    <tr class="bg-white border-b">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $period }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $sales->count() }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $sales->reduce(function ($products_count, $sale) {
                                return $products_count + $sale->attributes->count();
                            }, 0) }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $sales->reduce(function ($price_sum, $sale) {
                                return $price_sum + $sale->attributes->sum('price');
                            }, 0) }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-app-layout>
