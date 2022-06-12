<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon profil') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto">
        <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @foreach ($profile->links as $link)
                <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">
                    <a href="{{ route('profile.links.template', $link->token) }}">
                        Partager ce template
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
