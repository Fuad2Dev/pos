<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}

        <div class="flex justify-between">
            <div class="font-bold text-lg">
                {{-- TODO: sum quantity instead --}}
                count : {{ $products->count() }}
            </div>
            <div class="flex space-x-4">
                <a class="py-2 px-4 bg-indigo-500 text-white rounded" href="{{ route('product.create') }}">add new</a>
                <a class="py-2 px-4 bg-indigo-500 text-white rounded"
                    href="{{ route('product.create.import') }}">import</a>
            </div>
        </div>
    </x-slot>


    <div class="mx-7 py-4">
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-gray-800">
                    @foreach (['Category', 'Brand', 'Quantity', 'Price', ''] as $item)
                        <th scope="col" class="text-white font-medium px-4 py-2 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr class="bg-white border-b">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $product->category }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $product->brand }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $product->quantity }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $product->price }}
                        </td>
                        <td class="space-x-5">
                            <a href="{{ route('product.edit', $product) }}" class="text-indigo-500 text-lg">edit</a>
                            <a href="{{ route('product.show', $product) }}" class="text-indigo-500 text-lg">view</a>
                            <form style="display: inline" action="{{ route('product.destroy', $product) }}"
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
