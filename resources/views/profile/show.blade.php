<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon profil') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto">
        <livewire:profile.profile-form
            :user="$user"
        />
    </div>

</x-app-layout>
