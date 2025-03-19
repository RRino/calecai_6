<x-authentication-card>
    <x-slot name="logo">
        <x-application-logo />
    </x-slot>

    <!-- Form per il login -->
    <form method="POST" action="{{ route('login') }}">
        @csrf <!-- Token di sicurezza per prevenire CSRF -->

        <!-- Campo per l'email -->
        <div>
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <!-- Campo per la password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <!-- Checkbox per ricordare l'utente -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Ricordami') }}</span>
            </label>
        </div>

        <!-- Pulsante di invio -->
        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-3">
                {{ __('Login') }}
            </x-button>
        </div>
    </form>
</x-authentication-card>
