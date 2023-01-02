<x-app-layout>


    <x-slot name="header">
        <div class="flex justify-between">
            <p>Update Product</p>
            <x-link class="bg-red-500" :route="route('product.index')">cancel</x-link>
        </div>
    </x-slot>

    <div class="py-12">

        <form method="POST" action="{{ route('product.update', $product) }}" class="w-2/3 mx-auto space-y-5">
            @method('put')
            @csrf

            <div class="flex justify-between space-x-4">
                <!-- category -->
                <div class="w-1/2">
                    <x-input-label for="category" :value="__('Category')" />
                    <x-text-input id="category" class="block mt-1 w-full" type="text" name="category"
                        :value="$product->category" required autofocus />
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>
                <!-- brand -->
                <div class="w-1/2">
                    <x-input-label for="brand" :value="__('Brand')" />
                    <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand"
                        :value="$product->brand" required autofocus />
                    <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                </div>
            </div>


            <div class="flex justify-between space-x-4">
                <!-- price -->
                <div class="w-1/3">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                        :value="$product->price" required autofocus />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
            </div>

            <div class="flex justify-end">
                <x-primary-button class="ml-4">
                    {{ __('Update Product') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
