<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Public Repository List') }}</h3>

                    <form action="{{ route('search') }}" method="GET" class="flex justify-end mt-4">
                        <div class="flex items-center space-x-2">
                            <x-text-input id="search" name="search" type="text" class="block w-60" :value="request('search', old('search'))"  autofocus autocomplete="name" placeholder="Search..." />

                            <button type="submit" class="inline-flex items-center px-4 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Search
                            </button>
                            <a href="{{ url()->current() }}" class="inline-flex items-center px-4 py-3 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Clear
                            </a>
                        </div>
                    </form>

                    @if ($repos && count($repos) > 0)
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                            <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">Name</th>
                                                <th scope="col" class="px-6 py-4">Description</th>
                                                <th scope="col" class="px-6 py-4">Stars</th>
                                                <th scope="col" class="px-6 py-4">Forks</th>
                                                <th scope="col" class="px-6 py-4">Language</th>
                                                <th scope="col" class="px-6 py-4">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($repos as $repo)
                                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $repo['name'] ?? '' }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $repo['description'] ?? '' }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $repo['stargazers_count'] ?? 0 }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $repo['forks_count'] ?? 0 }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $repo['language'] ?? '' }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a
                                                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                                            href="{{ $repo['html_url'] }}"
                                                            target="_blank"
                                                            rel="noopener noreferrer">
                                                            Link
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="">{{ __('No repositories found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
