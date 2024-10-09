<section>
    <header class="flex items-center justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
        <a class="inline-flex items-center justify-center rounded-md border border-gray-300 bg-blue-500 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white shadow-sm transition duration-150 ease-in-out hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25" href="{{ route('profile.edit') }}">
            Edit Profile
        </a>
    </header>

    <div class="mt-10 sm:max-w-md p-10 border border-gray-300 rounded-lg mx-auto">
        <div class="flex items-center gap-2">
            <div class="h-[60px] w-[60px] rounded-full overflow-hidden border border-gray-400 p-[2px]">
                @if ($user->avatar)
                    <img src="{{ $user->avatar }}" alt="Profile Picture" class="rounded-full h-full w-full object-cover">
                @endif
            </div>
            <div class="flex flex-col gap-1">
                <div class="flex items-center gap-2">
                    <h3 class="text-md font-semibold text-gray-800 dark:text-gray-200">
                        {{ __('Username') }}:
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $user->username ?? '' }}
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <h3 class="text-md font-semibold text-gray-800 dark:text-gray-200">
                        {{ __('Number of Public Repositories') }}:
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $user->number_of_public_repos ?? 0 }}
                    </p>
                </div>
            </div>
        </div>


        <div class="pt-5 flex gap-2">
            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-200">
                {{ __('Bio') }}:
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ $user->bio ?? '' }}
            </p>
        </div>

    </div>
</section>
