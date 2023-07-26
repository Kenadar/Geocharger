<x-app-layout>
    <section>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Book Geodata') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Book your geodata.") }}
        </p>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('geodata.create') }}">
                     @csrf

                     <div class="mt-4">
                            <x-input-label for="tenant" :value="('Tenant')" />
                            <x-text-input id="tenant" class="block mt-1 w-full" type="string" name="tenant"/>
                            <x-input-error :messages="$errors->get('tenant')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="lessor" :value="('Lessor')" />
                            <x-text-input id="lessor" class="block mt-1 w-full" type="string" name="lessor"/>
                            <x-input-error :messages="$errors->get('lessor')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="geodata_id" :value="__('Geodata ID')" />
                            <x-text-input id="geodata_id" class="block mt-1 w-full" type="number" name="geodata_id"/>
                            <x-input-error :messages="$errors->get('geodata_id')" class="mt-2" />
                        </div>

                        
                        <div>
                                <label for="start_time">Choose your start booking date and time:</label><br>

                                <input  type="datetime-local" id="start_time"
                                name="start_time" value="2018-06-12T19:30">
                                <?php $date1= "start_time";
                                $timestamp1 = strtotime($date1);
                                echo $date1;
                                ?>

                        </div>

                            <div>
                                <label for="end_time">Choose your end booking date and time:</label><br>

                                <input  type="datetime-local" id="end_time"
                                name="end_time" value="2018-06-12T19:30">
                            </div>

                            

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-3">
                                    {{ __('Book') }}
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