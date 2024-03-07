<x-app-layout>
    <div class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm overflow-show dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <section>
                        <div class="py-6">
                            <div class="max-w-6xl px-6 mx-auto text-gray-500">
                                <div class="text-center">
                                    <h2 class="text-3xl font-semibold text-gray-950 dark:text-white">Dashboard</h2>
                                    <p class="mt-6 text-gray-700 dark:text-gray-300">Here's your breakdown on what you
                                        should do!</p>
                                </div>
                                <div class="grid gap-3 mt-12 sm:grid-cols-2 lg:grid-cols-3">
                                    <div
                                        class="relative p-8 overflow-hidden bg-white border border-gray-200 group rounded-xl dark:border-gray-800 dark:bg-gray-900">
                                        {{-- @livewire('to-do.dashboard.show-task-done-today') --}}

                                    </div>
                                    <div
                                        class="relative p-8 overflow-hidden bg-white border border-gray-200 group rounded-xl dark:border-gray-800 dark:bg-gray-900">
                                        {{-- @livewire('to-do.dashboard.show-task-unfinished-today') --}}

                                    </div>



                                </div>






                            </div>
                        </div>
                </div>
                </section>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>