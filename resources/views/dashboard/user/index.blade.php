<x-app-layout>
    <x-slot name="header">
        {{-- dashhboard links --}}
        <div class="flex justify-between">
            <x-dashboard-links />

            <x-link class="bg-indigo-500 text-white" :route="route('dashboard.user.create')">Add User</x-link>
        </div>

    </x-slot>

    {{-- TODO: add no product alert --}}
    <div class="mx-7 py-4">
        <table class="w-full border text-center">
            <thead class="border-b">
                <tr class="bg-gray-800">
                    @foreach (['Name', 'Email', 'Sales Made', ''] as $item)
                        <th scope="col" class="text-white font-medium px-4 py-2 border-r text-lg">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr class="bg-white border-b">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $user->name }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $user->email }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $user->sales_count }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            @if ($user->trashed())
                                <form action="{{ route('dashboard.user.enable', $user) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <x-primary-button class="bg-green-500">Enable</x-primary-button>
                                </form>
                            @else
                                <form action="{{ route('dashboard.user.disable', $user) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <x-primary-button>Disable</x-primary-button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</x-app-layout>
