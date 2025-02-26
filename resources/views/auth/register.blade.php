<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- User Type Selection -->
        <div class="mt-4">
            <x-input-label :value="__('Register as')" />
            <div class="mt-2 flex space-x-4">
                <div class="flex items-center">
                    <input id="user_type_tourist" type="radio" name="user_type" value="tourist" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" checked />
                    <label for="user_type_tourist" class="ml-2 block text-sm text-gray-700">
                        {{ __('Tourist') }}
                    </label>
                </div>
                <div class="flex items-center">
                    <input id="user_type_landlord" type="radio" name="user_type" value="landlord" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" />
                    <label for="user_type_landlord" class="ml-2 block text-sm text-gray-700">
                        {{ __('Landlord') }}
                    </label>
                </div>
            </div>
            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>