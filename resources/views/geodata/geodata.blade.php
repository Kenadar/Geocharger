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
                    <div>
                        <ul>
                            @foreach ($geodatas as $geodata) 
                            
                            <li>
                                <?= $geodata->name; ?>
                                <button><a href="/geodata/edit/<?= $geodata->id;?>">edit</a></button>
                                <button><a href="/geodata/delete/<?= $geodata->id; ?>"class ='color red-400' >delete</a></button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>