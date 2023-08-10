<x-app-layout>
<section>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Geodata Update') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your geodata.") }}
        </p>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
    
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('geodata.edit', $geodata->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $geodata->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="number" class="mt-1 block w-full" :value="old('address', $geodata->address)"/>
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            <div>
                       

                        <div>
                            <form>
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

                            </form>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </div>
        </div>
    </div>
                            

            @if (session('status') === 'geodata-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
</x-app-layout>
