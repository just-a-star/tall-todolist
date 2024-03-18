<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm overflow-show dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @livewire('to-do.show-to-do-all')


                    @livewire('to-do.show-kanban-board')
                    {{-- @livewire('to-do.edit-to-do', ['todo' => $todo], key('edit'.$todo->id)) --}}
                </div>
            </div>
        </div>
    </div>


</div>