<x-app-layout>


    <x-slot name="header">
        <div class="flex justify-between">
            <p>Import Products</p>
            <x-link route='product.import.template'>Download Template File</x-link>
        </div>
    </x-slot>

    <div class="py-12 w-2/3 mx-auto space-y-10">

        <form method="POST" action="{{ route('product.store.import') }}" class="space-y-5" enctype="multipart/form-data">
            @csrf

            <div class="w-1/2">
                <x-input-label for="products" :value="__('Products Excel file')" />
                <x-text-input id="products" class="boroder block mt-1 w-full p-2 border bg-white" type="file"
                    name="products" :value="old('products')" required autofocus accept=".xlsx, .xls, .csv" />
                <x-input-error :messages="$errors->get('products')" class="mt-2" />
            </div>
            {{-- <div class="flex justify-end"> --}}
            <x-primary-button class="">
                {{ __('Import') }}
            </x-primary-button>
            {{-- </div> --}}
        </form>

        @if ($errors->any())
            <div class="bg-red-200 p-4 rounded">
                <p class="font-bold">Error Encountered</p>
                <ol class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif

    </div>
</x-app-layout>
