<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mt-4 space-y-2">
        <a class="inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-[#333] text-white px-4 py-2 text-xs font-semibold uppercase tracking-widest shadow-sm transition duration-150 ease-in-out hover:bg-[#24292e] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25" href="{{ route('auth.redirect') }}">
            <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.37 0-.19-.01-.83-.01-1.49-2.24.49-2.71-1.08-2.71-1.08-.37-.93-.9-1.18-.9-1.18-.73-.49.06-.48.06-.48.8.06 1.22.82 1.22.82.71 1.22 1.87.87 2.32.67.07-.52.27-.87.49-1.07-1.75-.2-3.6-.88-3.6-3.92 0-.87.31-1.59.82-2.15-.08-.2-.35-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.03 2.2-.82 2.2-.82.43 1.1.16 1.93.08 2.12.51.56.82 1.28.82 2.15 0 3.05-1.85 3.72-3.6 3.92.27.23.5.67.5 1.36 0 .98-.01 1.77-.01 2.01 0 .2.15.45.55.37C13.71 14.53 16 11.54 16 8c0-4.42-3.58-8-8-8z"/></svg>
            Sign up with GitHub
        </a>
    </div>

    <form method="POST" action="{{ route('login') }}" class="mt-4">
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
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
