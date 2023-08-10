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
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="string" name="address"/>
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>


                        <div>
                            
                            <?php 
                            $dayOfWeek = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
                            $hourOfDay = range(1,24); 
                            ?>
                            @foreach($dayOfWeek as $day)
                                @foreach($hourOfDay as $hour)
                                    <?php $dayparting= $day . $hour?>
                                    <label for="dayparting"><?php echo $dayparting?></label>
                                    <input type="checkbox" name="dayparting[]" value=" <?php echo $dayparting?> ">
                                @endforeach

                            @endforeach

                            
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