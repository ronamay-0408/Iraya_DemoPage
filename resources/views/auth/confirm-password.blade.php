<head>
    <title>Iraya Energies | Confirm Password</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Iraya-logo-favicon.png') }}" />
</head>
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />
            <div x-data="{ show:false }" class="relative">
                <x-text-input id="password" 
                                class="block mt-1 w-full pr-10"
                                x-bind:type="show ? 'text' : 'password'"
                                name="password"
                                required autocomplete="new-password" />
                <!-- Eye Icon Button -->
                <button type="button" 
                    class="absolute inset-y-0 right-1 flex items-center p-2 text-gray-500 hover:text-gray-700 focus:outline-none" 
                    @click="show = !show">
                    
                    <!-- Eye (Hidden) -->
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M12 4.5c-4.5 0-8 4.5-8 7.5s3.5 7.5 8 7.5 8-4.5 8-7.5-3.5-7.5-8-7.5zm0 12a4.5 4.5 0 100-9 4.5 4.5 0 000 9z"/>
                    </svg>

                    <!-- Eye Slash (Visible) -->
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M3 12s3.5-7 9-7 9 7 9 7-3.5 7-9 7-9-7-9-7zm9 3a3 3 0 110-6 3 3 0 010 6zm-6-3a6 6 0 0112 0"/>
                        <line x1="4" y1="4" x2="20" y2="20" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
