<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}

        <div class="flex justify-end">
            add new
        </div>
    </x-slot>


    <div class="mx-7">
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-indigo-500">
                    @foreach (['Category', 'Brand', 'Quantity', 'Price', ''] as $item)
                        <th scope="col" class="text-white font-medium px-6 py-4 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">
                    @foreach (['Shoe', 'Gucci', '5', '230'] as $item)
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $item }}
                        </td>
                    @endforeach
                    <td>
                        <a href="" class="text-indigo-500 text-lg">view</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
