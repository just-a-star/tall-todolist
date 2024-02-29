<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label for="username" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Create
                Task</label>
            <div class="mt-2">
                {{-- Title Input --}}
                <div
                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                    <input type="text" name="title" id="title" autocomplete="title"
                        class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                        placeholder="Write the title here">
                </div>
                {{-- Description Input --}}
                <div class="mt-2">
                    <textarea id="about" name="about" rows="3"
                        class="block w-full dark:bg-transparent rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Description goes here"></textarea>
                </div>
                <div class="flex flex-row gap-2 mt-2 justify-items-center-2">

                    <livewire:components.datepicker />

                    <livewire:components.select-priority />


                </div>
            </div>
        </div>
    </div>



    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
</div>