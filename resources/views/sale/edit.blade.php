<x-app-layout>


    <x-slot name="header">
        <div class="flex justify-between items-center">
            <p>Edit Sale</p>
            <x-link class="text-white bg-red-500" :route="route('sale.index')">cancel</x-link>
        </div>
    </x-slot>

    <div class="py-12">

        <form method="POST" action="{{ route('sale.update', $sale) }}" class="w-2/3 mx-auto space-y-5">
            @csrf
            @method('PUT')
            <!-- client -->
            <div>
                <x-input-label for="client" :value="__('Client\'s Name - Optional')" />
                <x-text-input id="client" class="block mt-1 w-full" type="text" name="client" :value="$sale->client"
                    autofocus />
                <x-input-error :messages="$errors->get('client')" class="mt-2" />
            </div>
            <!-- note -->
            <div class="w-full">
                <x-input-label for="note" :value="__('Note (helps you ID this sale later) - required if no name is provided')" />
                <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="note" id="" cols="15" rows="5">{{ $sale->note }}</textarea>
                <x-input-error :messages="$errors->get('note')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-primary-button class="ml-4">
                    {{ __('Edit Sale') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
