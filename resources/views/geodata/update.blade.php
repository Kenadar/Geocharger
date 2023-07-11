@section('update')
<form method="post" action="{{ route('geodata.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="latitude" :value="__('Latitude')" />
            <x-text-input id="latitude" name="latitude" type="integer" class="mt-1 block w-full" :value="old('email', $user->email)" />
            <x-input-error class="mt-2" :messages="$errors->get('latitude')" />
        </div>

        <div>
            <x-input-label for="longitude" :value="__('Longitude')" />
            <x-text-input id="longitude" name="longitude" type="integer" class="mt-1 block w-full" :value="old('email', $user->email)" />
            <x-input-error class="mt-2" :messages="$errors->get('longitude')" />
        </div>
<form>
@endsection