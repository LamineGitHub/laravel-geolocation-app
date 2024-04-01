<x-app-layout>

    <div class="max-w-xl mx-auto space-y-3 lg:px-8 px-6 py-6 border rounded-lg shadow-md bg-white">
        <div class="flex items-center justify-between space-x-6">

            <div class="py-16 rounded-lg w-1/3 bg-gray-100 text-center flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-16 h-16">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                </svg>
            </div>

            <div class="space-y-4 *:text-xl *:font-semibold">
                <h1>Nom: {{ $promoteur->nom }}</h1>
                <p>Email: {{ $promoteur->email }}</p>
                <p>Tel: {{ $promoteur->tel }}</p>
                <p>BP: {{ $promoteur->bp }}</p>
            </div>
        </div>

        @if($promoteur->user?->is(auth()->user()))
            <hr>

            <div class="space-x-4 flex items-center">
                <x-create-link :href="route('promoteur.edit', $promoteur)">{{ __('Modifier') }}</x-create-link>

                <x-delete-link>
                    <form id="deleteForm2_{{ $promoteur->id }}" action="{{ route('promoteur.destroy', $promoteur) }}"
                          method="post" class="delete-link">
                        @csrf
                        @method('DELETE')

                        <a :href="" >
                            {{ __('Supprimer') }}
                        </a>
                    </form>
                </x-delete-link>
            </div>
    </div>
    @endif
    </div>
</x-app-layout>
