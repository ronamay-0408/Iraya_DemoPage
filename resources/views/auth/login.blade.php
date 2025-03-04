<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <div class="text-center my-4">
        <hr class="my-2">
        <span class="text-center font-bold">OR</span>
        <div class="w-3/5 mx-auto mt-4">
            <a href="{{ route('google-auth') }}"
                class="focus:ring-2 focus:ring-indigo-8000 focus:ring-offset-4 bg-gray flex items-center"> 
            </a> 
            <svg xmlns="https://www.w3.org/2000/svg" width="28" height="28"
                class="bi bi-google ml-2" viewbox="0 0 16 16">
                <path d="M21.35 11.1H12v2.9h5.65c-.25 1.3-.95 2.4-2 3.15v2.6h3.25c1.9-1.75 3-4.3 3-7.2 0-.6-.05-1.2-.15-1.75zM12 21c2.7 0 4.95-.9 6.6-2.4l-3.25-2.6c-.9.6-2.05.95-3.35.95-2.6 0-4.8-1.75-5.6-4.15H3.05v2.6C4.7 18.55 8.05 21 12 21zM6.4 13.75c-.2-.6-.3-1.25-.3-1.9s.1-1.3.3-1.9V7.25H3.05C2.4 8.55 2 10 2 11.85c0 1.85.4 3.3 1.05 4.6l3.35-2.7zM12 4.5c1.45 0 2.8.5 3.85 1.5l2.85-2.85C16.95 1.3 14.7.5 12 .5c-3.95 0-7.3 2.45-8.95 6l3.35 2.6c.8-2.4 3-4.1 5.6-4.1z" fill="#4285F4"/>
            </svg>
        </div>
    </div>
</x-guest-layout>
