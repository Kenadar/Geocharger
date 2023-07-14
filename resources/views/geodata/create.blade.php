<x-app-layout>
    <section>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create Geodata') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Create your geodata.") }}
        </p>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('geodata.create') }}">
                     @csrf

                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="string" name="name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="latitude" :value="__('Latitude')" />
                            <x-text-input id="latitude" class="block mt-1 w-full" type="number" name="latitude"/>
                            <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="longitude" :value="__('longitude')" />
                            <x-text-input id="longitude" class="block mt-1 w-full" type="number" name="longitude"/>
                            <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                 </div>
            </div>
        </div>
    </div>
</div>
    </form>
</section>
</x-app-layout>