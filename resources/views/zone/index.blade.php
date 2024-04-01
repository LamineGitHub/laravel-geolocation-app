<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zones') }}
        </h2>
        <div class="flex justify-between items-center space-x-12">
            <x-search-input action="{{ route('zone.search') }}"/>
            <x-create-link :href="route('zone.create')">{{ __('Ajouter') }}</x-create-link>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg divide-y-2">

            @forelse( $zones as $zone )
                @php
                    $nbrTerrain = $zone->terrains->count();
                @endphp

                <div class="px-6 py-8 space-x-2">
                    <div class="flex justify-between flex-1">
                        <div class="space-y-0.5">
                            <P class="text-2xl font-semibold text-gray-900">
                                {{ $zone->nom }}
                            </P>
                            <p>Dans la région de {{ $zone->region->nom }}</p>
                            <p class="text-sm">Au coordonné : {{ $zone->localisation }} </p>
                            @if ($nbrTerrain > 0)
                                <p class="text-sm">Il a {{ $nbrTerrain }} terrain{{ $nbrTerrain > 1 ? 's' : '' }} </p>
                            @else
                                <p class="text-sm">Il n'y a pas de terrain pour cette zone</p>
                            @endif
                        </div>

                        @can ('update', $zone)
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
                                                     :href="route('zone.edit', $zone)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form id="deleteForm_{{ $zone->id }}" action="{{ route('zone.destroy', $zone) }}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')

                                        <x-dropdown-link :href="route('zone.destroy', $zone)"
                                                         class="hover:bg-red-500 hover:text-white focus:bg-red-100 delete-link"
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
                <p class="text-center text-2xl font-semibold py-6">Aucune zone trouvée</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
