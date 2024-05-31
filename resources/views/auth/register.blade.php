<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center"
        style="background: linear-gradient(to bottom right, #062552, #7c4a98);">
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

            <x-validation-errors class="mb-4" />
            <div class="bg-gray-800 py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <label for="name" value="{{ __('Name') }}" class="block text-sm font-medium text-white">
                            Nombre
                        </label>
                        <div class="mt-1">
                            <input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name">
                        </div>
                    </div>

                    <div>
                        <label for="email" value="{{ __('Email') }}" class="block text-sm font-medium text-white">
                            Email
                        </label>
                        <div class="mt-1">
                            <input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username">
                        </div>
                    </div>

                    <div>
                        <label for="password" value="{{ __('Password') }}" class="block text-sm font-medium text-white">
                            Password
                        </label>
                        <div class="mt-1">
                            <input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block text-sm font-medium text-white">
                            Confirm Password
                        </label>
                        <div class="mt-1">
                            <input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>                  

                    

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                                __('Terms of Service') .
                                                '</a>',
                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('policy.show') .
                                                '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                                __('Privacy Policy') .
                                                '</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-300 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ms-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-authentication-card>
    </div>
</x-guest-layout>
