<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Geodata') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You can create your geodata point here!") }}
                    <ul class="mt-3 ">
                        <li>Longitude: 12.123 Latitude: 13.234<button type="submit" class=" mt-text-m text-red-900 dark:text-red-400 hover:text-red-900 dark:hover:text-red-100 rounded-md focus:outline-none focus:ring-2 ">{{ __('Delete') }}</button></li>
                        <li>Longitude: 12.123 Latitude: 13.234<button type="submit" class=" mt-text-m text-red-900 dark:text-red-400 hover:text-red-900 dark:hover:text-red-100 rounded-md focus:outline-none focus:ring-2 ">{{ __('Delete') }}</button></li>
                        <li>Longitude: 12.123 Latitude: 13.234<button type="submit" class=" mt-text-m text-red-900 dark:text-red-400 hover:text-red-900 dark:hover:text-red-100 rounded-md focus:outline-none focus:ring-2 ">{{ __('Delete') }}</button></li>
                        <li>Longitude: 12.123 Latitude: 13.234<button type="submit" class=" mt-text-m text-red-900 dark:text-red-400 hover:text-red-900 dark:hover:text-red-100 rounded-md focus:outline-none focus:ring-2 ">{{ __('Delete') }}</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>