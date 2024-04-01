<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Terrains') }}
        </h2>
        {{--        <div>--}}
        <x-create-link :href="route('terrain.create')">{{ __('Ajouter') }}</x-create-link>
        {{--        </div>--}}
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg divide-y-2">

            @foreach ( $terrains as $terrain )
                <div class="px-6 py-8 space-x-2">
                    <div class="flex justify-between flex-1">
                        <div class="space-y-0.5">
                            <p class="text-2xl font-semibold text-gray-900">
                                Ce terrain est dans la zone de {{ $terrain->zone->nom }}
                            </p>
                            <p class="">Avec une superficie de : {{ $terrain->superficie }} km²</p>
                        </div>

                        @can('update', $terrain)
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
                                                     :href="route('terrain.edit', $terrain)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form id="deleteForm_{{ $terrain->id }}"
                                          action="{{ route('terrain.destroy', $terrain) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <x-dropdown-link :href="route('terrain.destroy', $terrain)"
                                                         class="hover:bg-red-500 hover:text-white focus:bg-red-100 delete-link">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
