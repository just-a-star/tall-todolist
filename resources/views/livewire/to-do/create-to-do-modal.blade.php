<div>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    {{-- The best athlete wants his opponent at his best. --}}
    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" class="relative w-auto h-auto z-1">
        <button @click="modalOpen=true"
            class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors bg-white border rounded-md hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">Create
            Task</button>
        
            <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
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
                        <h3 class="text-lg font-semibold">Create Task</h3>
                        <button @click="modalOpen=false"
                            class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="relative w-auto">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                {{-- <p class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Create
                                    Task</p> --}}
                                <p class="mt-3 text-sm leading-6 text-gray-600">What are you gonna do today?</p>
                                <div class="mt-2">
                                    {{-- Title Input --}}
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                        <input wire:model="title" type="text" name="title" id="title"
                                            autocomplete="title"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="Write the title here">
                                    </div>
                                    {{-- Description Input --}}
                                    <div class="mt-2">
                                        <textarea wire:model="description" id="description" name="description" rows="3"
                                            class="block w-full dark:bg-transparent rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="Description goes here"></textarea>
                                    </div>
                                    <div class="flex flex-row gap-2 mt-2 justify-items-center-2">

                                        <livewire:components.datepicker />

                                        {{--
                                        <livewire:components.select-priority /> --}}
                                        <div class="relative">
                                            <p class="block mb-1 text-sm font-medium text-neutral-500">
                                                Priority</p>
                                            <select wire:model="priority"
                                                class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-state">
                                                <option default value="1">High</option>
                                                <option value="2">Medium</option>
                                                <option value="3">Low</option>
                                            </select>

                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                                {{-- <svg class="w-4 h-4 fill-current"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg> --}}
                                            </div>
                                        </div>

                                    </div>
                                    <button wire:click="createToDoModal" type="button" @click="modalOpen=false"
                                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">Add
                                        Task</button>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--
        </template> --}}
    </div>
</div>
