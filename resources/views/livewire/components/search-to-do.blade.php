<div class="w-full">
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
        class="relative z-50 flex w-auto h-auto">
        <button @click="modalOpen=true"
            class="flex items-center w-full px-4 py-2 text-sm font-medium text-gray-900 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-100 dark:hover:bg-gray-800 dark:focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>

            <span class="ml-2">Search</span></button>

        <div x-show="modalOpen" class="fixed left-0 top-0 z-[99] flex h-screen w-screen items-center justify-center"
            x-cloak>
            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="modalOpen=false"
                class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
            <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-lg font-semibold">Search</h3>
                    <button @click="modalOpen=false"
                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:bg-gray-50 hover:text-gray-800">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="relative w-auto">

                    <div class="p-3">
                        <div>
                            <form class="d-flex" role="search">
                                <input type="text" wire:model.debounce.500ms="search" class="form-control"
                                    placeholder="Search todo..." x-data>
                            </form>
                            {{-- @if (sizeof($todos) > 0) --}}
                            <div class="py-1 dropdown-menu d-block ">
                                @foreach ($Todos as $todo)
                                <div class="px-3 py-1 mb-2 border border-stone-400 border-bottom">
                                    <div class="flex-row d-flex">
                                        <div class="flex flex-row gap-2">
                                            <span class="flex items-center justify-center text-sm text-gray-800">{{
                                                $todo->title }}</span>
                                            <span class="flex flex-row">@livewire('to-do.edit-to-do', ['todo' => $todo],
                                                key('edit'.$todo->id))</span>
                                        </div>
                                        <small
                                            class="{{ $todo->priority == 1 ? 'text-red-500' : ($todo->priority == 2 ? 'text-yellow-500' : 'text-green-500') }}">
                                            {{ $todo->priority == 1 ? 'High' : ($todo->priority == 2 ? 'Medium' : 'Low')
                                            }}
                                        </small>
                                        <small class="text-gray-500">{{
                                            \Carbon\Carbon::parse($todo->due_date)->diffForHumans() }}</small>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{-- @endif --}}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>