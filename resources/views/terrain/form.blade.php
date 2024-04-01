@php
    $isEditPage = (bool)$terrain->id;
    $title = $isEditPage ? 'Editer' : 'Ajouter';
@endphp


<div class="max-w-xl mx-auto space-y-3">

    <x-back-link :href="route('terrain.index')"/>

    <div class="lg:px-8 px-6 py-6 border rounded-lg shadow-md bg-white">

        <form method="POST" action="{{ $isEditPage ? route('terrain.update', $terrain) : route('terrain.store') }}">
            @csrf

            @if($isEditPage)
                @method('PATCH')
            @endif

            <h1 class="text-2xl font-semibold mb-6">{{ $title }} un térrain</h1>
            <div class="space-y-6">

                <!-- Superficie -->
                <div>
                    <x-input-label for="superficie" :value="__('Superficie')"/>
                    <x-text-input id="superficie" class="block mt-1 w-full" type="number" name="superficie"
                                  :value="old('superficie', $terrain->superficie)" required/>
                    <x-input-error :messages="$errors->get('superficie')" class="mt-2"/>
                </div>

                <!-- Région_id -->
                <div>
                    <x-input-label for="zone_id" :value="__('Zone')"/>
                    <x-select id="zone_id" name="zone_id">
                        <option value="0">Sélectionner une zone</option>
                        @foreach( $zones as $zone )
                            <option
                                @selected( old('zone_id', $zone->id) === $terrain->region_id )
                                value="{{ $zone->id }}">{{ $zone->nom }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('zone_id')" class="mt-2"/>
                </div>

                <!-- Description -->
                <div>
                    <x-input-label for="description" :value="__('Description')"/>
                    <x-textarea id="description" name="description" class="block mt-1 w-full">
                        {{ old('description', $terrain->description) }}
                    </x-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>

                <div class="space-x-4">
                    <x-primary-button> {{ $isEditPage ? __('Modifier') :  __('Enregistrer') }}</x-primary-button>
                    <x-secondary-button type="reset">{{ __('Annuler') }}</x-secondary-button>
                </div>
            </div>
        </form>
    </div>
</div>
