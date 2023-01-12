{{-- shop --}}
{{-- logo --}}
{{-- admin email --}}
{{-- admin password --}}
<x-guest-layout>
    <form method="POST" action="{{ route('initialize') }}" enctype="multipart/form-data">
        @csrf

        <!-- shop name -->
        <div>
            <x-input-label for="shop_name" :value="__('Shop\'s Name')" />
            <x-text-input id="shop_name" class="block mt-1 w-full" type="text" name="shop_name" :value="old('shop_name')"
                required autofocus />
            <x-input-error :messages="$errors->get('shop_name')" class="mt-2" />
        </div>

        <!-- name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Admin\'s Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- logo -->
        <div class="mt-4">
            <x-input-label for="logo" :value="__('Shop\'s Logo')" />
            <x-text-input
                class="p-2 block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded cursor-pointer bg-gray-50 focus:outline-none"
                name="logo" id="logo" type="file" :value="old('logo')" />
            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Admin Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Admin Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Admin Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('Initialize Application') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
