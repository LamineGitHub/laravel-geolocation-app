@php
    $isEditPage = (bool)$promoteur->id;
    $title = $isEditPage ? 'Editer' : 'Ajouter';
@endphp

<div class="max-w-xl mx-auto space-y-3">

    <x-back-link :href="route('promoteur.index')"/>

    <div class="lg:px-8 px-6 py-6 border rounded-lg shadow-md bg-white">

        <form method="POST"
              action="{{ $isEditPage ? route('promoteur.update', $promoteur) : route('promoteur.store') }}">
            @csrf

            @if($isEditPage)
                @method('PATCH')
            @endif

            <h1 class="text-2xl font-semibold mb-6">{{ $title }} un promoteur</h1>
            <div class="space-y-6">

                <!-- Name -->
                <div>
                    <x-input-label for="nom" :value="__('Nom')"/>
                    <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom"
                                  :value="old('name', $promoteur->nom)" required/>
                    <x-input-error :messages="$errors->get('nom')" class="mt-2"/>
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                  :value="old('email', $promoteur->email)" required/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <!-- Tel -->
                <div>
                    <x-input-label for="tel" :value="__('Téléphone')"/>
                    <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel"
                                  :value="old('tel', $promoteur->tel)" required/>
                    <x-input-error :messages="$errors->get('tel')" class="mt-2"/>
                </div>

                <!-- Bp -->
                <div>
                    <x-input-label for="bp" :value="__('Boite Postale')"/>
                    <x-text-input id="bp" class="block mt-1 w-full" type="number" name="bp"
                                  :value="old('bp', $promoteur->bp)" required/>
                    <x-input-error :messages="$errors->get('bp')" class="mt-2"/>
                </div>

                <div class="space-x-4">
                    <x-primary-button> {{ $isEditPage ? __('Modifier') :  __('Enregistrer') }}</x-primary-button>
                    <x-secondary-button type="reset">{{ __('Annuler') }}</x-secondary-button>
                </div>
            </div>
        </form>
    </div>
</div>
