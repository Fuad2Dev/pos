<x-app-layout>


    <x-slot name="header">
        <div class="flex justify-between">
            <p>Add Product</p>
            <x-link class="text-white bg-red-500" :route="route('product.show', $product)">cancel</x-link>
        </div>
    </x-slot>

    <div class="py-12">

        <form method="POST" action="{{ route('product.attribute.store', $product) }}" class="w-2/3 mx-auto space-y-5">
            @csrf

            <div class="flex justify-between space-x-4">
                <!-- color -->
                <div class="w-1/3">
                    <x-input-label for="color" :value="__('Color')" />
                    <x-text-input id="color" class="block mt-1 w-full" type="text" name="color"
                        :value="old('color')" required autofocus />
                    <x-input-error :messages="$errors->get('color')" class="mt-2" />
                </div>
                <!-- size -->
                <div class="w-1/3">
                    <x-input-label for="size" :value="__('Size')" />
                    <x-text-input id="size" class="block mt-1 w-full" type="text" name="size"
                        :value="old('size')" required autofocus />
                    <x-input-error :messages="$errors->get('size')" class="mt-2" />
                </div>
            </div>


            <div class="flex justify-between space-x-4">

                <!-- description -->
                <div class="w-full">
                    <x-input-label for="description" :value="__('Description (**optional)')" />
                    <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                        name="description" id="" cols="15" rows="5"></textarea>
                    {{-- <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                        :value="old('description')" required autofocus /> --}}
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            </div>

            <div class="flex justify-end">
                <x-primary-button class="ml-4">
                    {{ __('Add Product') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
