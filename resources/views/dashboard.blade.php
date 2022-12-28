<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div> --}}

        {{-- categories --}}
        <div class="flex px-4 space-x-3 overflow-x-scroll w-full">
            <x-category>Category 1</x-category>
            <x-category>Category 2</x-category>
            <x-category>Category 3</x-category>
            <x-category>Category 4</x-category>
            <x-category>Category 5</x-category>
            <x-category>Category 6</x-category>
            <x-category>Category 7</x-category>
            <x-category>Category 8</x-category>
            <x-category>Category 9</x-category>
            <x-category>Category 10</x-category>
            <x-category>Category 11</x-category>
            <x-category>Category 12</x-category>
            <x-category>Category 13</x-category>
            <x-category>Category 14</x-category>
            <x-category>Category 15</x-category>
            {{-- <div class="px-4 py-2 bg-indigo-500 text-white rounded">
                Blazzers
            </div>
            <div class="px-4 py-2 bg-indigo-500 text-white rounded">
                Trousers
            </div>
            <div class="px-4 py-2 bg-indigo-500 text-white rounded">
                Tops
            </div>
            <div class="px-4 py-2 bg-indigo-500 text-white rounded">
                Suits
            </div> --}}


        </div>

        {{-- <table class="table-fixed ">
            <thead>
                <tr>
                    <th>Song</th>
                    <th>Artist</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                    <td>Malcolm Lockyer</td>
                    <td>1961</td>
                </tr>
                <tr>
                    <td>Witchy Woman</td>
                    <td>The Eagles</td>
                    <td>1972</td>
                </tr>
                <tr>
                    <td>Shining Star</td>
                    <td>Earth, Wind, and Fire</td>
                    <td>1975</td>
                </tr>
            </tbody>
        </table> --}}

    </div>
</x-app-layout>
