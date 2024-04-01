@php
    $isEditPage = (bool)$zone->id;
    $title = $isEditPage ? 'Editer' : 'Ajouter';
@endphp


<div class="max-w-xl mx-auto space-y-3">

    <x-back-link :href="route('zone.index')"/>

    <div class="lg:px-8 px-6 py-6 border rounded-lg shadow-md bg-white">

        <form method="POST" action="{{ $isEditPage ? route('zone.update', $zone) : route('zone.store') }}">
            @csrf

            @if($isEditPage)
                @method('PATCH')
            @endif

            <h1 class="text-2xl font-semibold mb-6">{{ $title }} une zone</h1>
            <div class="space-y-6">

                <!-- Name -->
                <div>
                    <x-input-label for="nom" :value="__('Nom')"/>
                    <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom"
                                  :value="old('name', $zone->nom)" required/>
                    <x-input-error :messages="$errors->get('nom')" class="mt-2"/>
                </div>

                <!-- Localisation -->
                <div>
                    <x-input-label for="localisation" :value="__('Localisation')"/>
                    <x-text-input id="localisation" class="block mt-1 w-full" type="text" name="localisation"
                                  :value="old('localisation', $zone->localisation)" required/>
                    <x-input-error :messages="$errors->get('localisation')" class="mt-2"/>
                </div>

                <!-- Région_id -->
                <div>
                    <x-input-label for="region_id" :value="__('Région')"/>
                    <x-select id="region_id" name="region_id">
                        <option value="0">Sélectionner une région</option>
                        @foreach( $regions as $region )
                            <option
                                @selected( old('region_id', $region->id) === $zone->region_id )
                                value="{{ $region->id }}">{{ $region->nom }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('region_id')" class="mt-2"/>
                </div>

                <!-- Description -->
                <div>
                    <x-input-label for="description" :value="__('Description')"/>
                    <x-textarea id="description" name="description" class="block mt-1 w-full">
                        {{ old('description', $zone->description) }}
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
