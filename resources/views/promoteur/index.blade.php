<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Promoteur') }}
        </h2>
        <div class="flex justify-between items-center space-x-12">
            <x-search-input action="{{ route('promoteur.search') }}"/>
            <x-create-link :href="route('promoteur.create')">{{ __('Ajouter') }}</x-create-link>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow-sm rounded-lg divide-y-2">

            @forelse ( $promoteurs as $promoteur )
                <div class="px-6 py-8 space-x-2">
                    <div class="flex justify-between flex-1">
                        <div class="space-y-0.5">
                            <a href="{{ route('promoteur.show', $promoteur) }}"
                               class="inline-block text-2xl font-semibold text-gray-900
                               hover:text-indigo-500 focus:text-indigo-500 transition duration-150 ease-in-out -mx-6
                               px-6 -my-2 py-2">
                                {{ $promoteur->nom }}
                            </a>
                            <p>Tel : {{ $promoteur->tel }}</p>
                        </div>

                        @can('update', $promoteur)
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-5 w-5 text-gray-400"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link class="hover:bg-indigo-500 hover:text-white focus:bg-indigo-100"
                                                     :href="route('promoteur.edit', $promoteur)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form id="deleteForm_{{ $promoteur->id }}" action="{{ route('promoteur.destroy',
                                    $promoteur) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <x-dropdown-link :href="route('promoteur.destroy', $promoteur)"
                                                         class="hover:bg-red-500 hover:text-white focus:bg-red-100
                                                         delete-link"
                                        >
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endcan
                    </div>
                </div>
            @empty
                <p class="text-center text-2xl font-semibold py-6">Aucun promoteur trouvé</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
