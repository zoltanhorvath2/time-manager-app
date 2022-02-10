<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" hidden>
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
            <h2>Ha még nincs fiókja, kérjük, regisztráljon!</h2>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Felhasználónév')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Jelszó')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password" autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Jelszó megerősítése')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Regisztráció') }}
                </x-button>
            </div>
            <a href="{{ route('welcome') }}"><h3>&leftarrow; Vissza a kezdőoldalra</h3></a>
        </form>
    </x-auth-card>
</x-guest-layout>
