<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Sales') }}
        </h2> --}}

        <div class="flex justify-between">
            <div class="font-bold text-lg">
                All Sales
            </div>

            <a class="py-2 px-4 bg-indigo-500 text-white rounded" href="{{ route('sale.create') }}">add sale</a>

        </div>
    </x-slot>

    {{-- TODO: add no product alert --}}
    <div class="mx-7 py-4">
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-gray-800">
                    @foreach (['Client', 'Amount', 'Product', 'Date (m-d)', 'status', ''] as $item)
                        <th scope="col" class="text-white font-medium px-4 py-2 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @foreach ($sales as $sale)
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
                            <a href="{{ route('sale.show', $sale) }}">view</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-app-layout>
