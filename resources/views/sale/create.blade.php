<x-app-layout>


    <x-slot name="header">
        <div class="flex justify-between items-center">
            <p>Open New Sale</p>
            <x-link class="bg-red-500" :route="route('sale.index')">cancel</x-link>
        </div>
    </x-slot>

    <div class="py-12">

        <form method="POST" action="{{ route('sale.store') }}" class="w-2/3 mx-auto space-y-5">
            @csrf

            <!-- client -->
            <div>
                <x-input-label for="client" :value="__('Client\'s Name - Optional (can be added later)')" />
                <x-text-input id="client" class="block mt-1 w-full" type="text" name="client" :value="old('client')"
                    autofocus />
                <x-input-error :messages="$errors->get('client')" class="mt-2" />
            </div>
            <!-- note -->
            <div class="w-full">
                <x-input-label for="note" :value="__('Note - Optional (helps you ID this later)')" />
                <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="note" id="" cols="15" rows="5"></textarea>
                <x-input-error :messages="$errors->get('note')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-primary-button class="ml-4">
                    {{ __('Open Sale') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
