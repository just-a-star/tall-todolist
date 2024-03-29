<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Today task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm overflow-show dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">




                    <livewire:to-do.create-to-do-modal />

                    <livewire:to-do.show-to-do-today />

                    <livewire:to-do.show-to-do-completed />


                    @livewire('to-do.show-to-do-all')
                    {{--
                    <livewire:to-do.edit-to-do /> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
