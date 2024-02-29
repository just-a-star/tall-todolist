<div x-data="{ selectOpen: false, selectedItem: @entangle('priority') }" class="relative w-48">
    <label for="priority" class="block mb-1 text-sm font-medium text-neutral-500">Prioritization</label>
    <button @click="selectOpen = !selectOpen" :class="{ 'bg-blue-500': selectedItem, 'bg-gray-300': !selectedItem }"
        class="w-full p-2 border rounded-md">
        <span x-text="selectedItem ? selectedItem : 'Select Priority'"></span>
    </button>

    <ul x-show="selectOpen" @click.away="selectOpen = false" x-transition
        class="absolute z-10 w-full mt-2 overflow-auto text-sm bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5">
        <template x-for="(item, index) in [
    { title: 'Do it now', value: 'do_now' },
    { title: 'Crucial but later', value: 'crucial_later' },
    { title: 'Not crucial do now', value: 'not_crucial_do_now' },
    { title: 'Uncategorized', value: 'uncategorized' },
]" :key="index">
            <li @click="selectedItem = item.value; selectOpen = false; Livewire.emit('updatePriority', item.value)"
                class="p-2 cursor-pointer select-none hover:bg-gray-100"
                :class="{ 'bg-gray-200': selectedItem === item.value }" x-text="item.title"></li>

        </template>

    </ul>
</div>