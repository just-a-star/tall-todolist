<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            {{-- <label for="username" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Create
                Task</label> --}}
            <div class="mt-2">
                {{-- Title Input --}}
                <div
                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                    <input wire:model="title" type="text" name="title" id="title" autocomplete="title"
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
                        <select wire:model="priority"
                            class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state">
                            <option value="1">High</option>
                            <option value="2">Medium</option>
                            <option value="3">Low</option>
                        </select>

                        <div
                            class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                            {{-- <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg> --}}
                        </div>
                    </div>

                </div>
                <button wire:click="createToDo" type="button"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">Add
                    Task</button>
            </div>


            <p class="mt-3 text-sm leading-6 text-gray-600">What are you gonna do today?</p>
        </div>
    </div>
</div>