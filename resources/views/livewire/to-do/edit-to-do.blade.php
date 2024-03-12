<div>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" class="relative z-50 w-auto h-auto">
        <button @click="modalOpen=true"
            class="inline-flex items-center justify-center h-10 text-sm font-medium transition-colors rounded-md hover:bg-neutral-100 focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 active:bg-white disabled:pointer-events-none disabled:opacity-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
        </button>

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
                    <h3 class="text-lg font-semibold">Edit Task</h3>
                    <button @click="modalOpen=false"
                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:bg-gray-50 hover:text-gray-800">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="relative w-auto">
                    <p class="mt-3 text-sm leading-6 text-gray-600">What are you gonna do today?</p>
                    <form wire:submit.prevent='edit'>
                        <div class="mt-2">
                            {{-- Title Input --}}

                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                <input wire:model="title" type="text" name="title" id="title" autocomplete="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Write the title here" />

                            </div>
                            {{-- Description Input --}}
                            <div class="mt-2">
                                <textarea wire:model="description" id="description" name="description" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:bg-transparent sm:text-sm sm:leading-6"
                                    placeholder="Description goes here"></textarea>
                            </div>
                            <div class="flex flex-row gap-2 mt-2 justify-items-center-2">

                                @livewire('components.datepicker', ['due_date' => $due_date])
                                {{-- @livewire('components.datepicker', ['due_date' => $due_date], key($due_date)) --}}

                                {{--
                                <livewire:components.select-priority /> --}}
                                <div class="relative">
                                    <p class="block mb-1 text-sm font-medium text-neutral-500">
                                        Priority</p>
                                    <select wire:model="priority"
                                        class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:border-gray-500 focus:bg-white focus:outline-none"
                                        id="grid-state">
                                        <option default value="1">High</option>
                                        <option value="2">Medium</option>
                                        <option value="3">Low</option>
                                    </select>


                                </div>

                            </div>
                            <button type="submit" @click="modalOpen=false"
                                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md focus:shadow-outline bg-neutral-950 hover:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2">Edit
                                Task</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- </template> --}}
</div>
</div>
