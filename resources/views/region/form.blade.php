@php
    $isEditPage = (bool)$region->id;
    $title = $isEditPage ? 'Editer' : 'Ajouter';
@endphp

<div class="max-w-xl mx-auto space-y-3">

    <x-back-link :href="route('region.index')"/>

    <div class="lg:px-8 px-6 py-6 border rounded-lg shadow-md bg-white">

        <form method="POST" action="{{ $isEditPage ? route('region.update', $region) : route('region.store') }}">
            @csrf

            @if($isEditPage)
                @method('PATCH')
            @endif

            <h1 class="text-2xl font-semibold mb-6">{{ $title }} une région</h1>
            <div class="space-y-6">

                <!-- Name -->
                <div>
                    <x-input-label for="nom" :value="__('Nom')"/>
                    <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom"
                                  :value="old('name', $region->nom)" required/>
                    <x-input-error :messages="$errors->get('nom')" class="mt-2"/>
                </div>

                <!-- Superficie -->
                <div>
                    <x-input-label for="superficie" :value="__('Superficie')"/>
                    <x-text-input id="superficie" class="block mt-1 w-full" type="number" name="superficie"
                                  :value="old('superficie', $region->superficie)" required/>
                    <x-input-error :messages="$errors->get('superficie')" class="mt-2"/>
                </div>

                <div class="space-x-4">
                    <x-primary-button> {{ $isEditPage ? __('Modifier') :  __('Enregistrer') }}</x-primary-button>
                    <x-secondary-button type="reset">{{ __('Annuler') }}</x-secondary-button>
                </div>
            </div>
        </form>
    </div>
</div>
