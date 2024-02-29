<div x-data="{
    selectOpen: false,
    selectedItem: '',
    selectableItems: [
        {
            title: 'Do it now',
            value: 'do_now',
            disabled: false
        },
        {
            title: 'Crucial but later',
            value: 'crucial_later',
            disabled: false
        },
        {
            title: 'Not crucial do now',
            value: 'cheese',
            disabled: false
        },
        {
            title: 'Uncategorized',
            value: 'uncategorized',
            disabled: false
        },

    ],
    selectableItemActive: null,
    selectId: $id('select'),
    selectKeydownValue: '',
    selectKeydownTimeout: 1000,
    selectKeydownClearTimeout: null,
    selectDropdownPosition: 'bottom',
    selectableItemIsActive(item) {
        return this.selectableItemActive && this.selectableItemActive.value==item.value;
    },
    selectableItemActiveNext(){
        let index = this.selectableItems.indexOf(this.selectableItemActive);
        if(index < this.selectableItems.length-1){
            this.selectableItemActive = this.selectableItems[index+1];
            this.selectScrollToActiveItem();
        }
    },
    selectableItemActivePrevious(){
        let index = this.selectableItems.indexOf(this.selectableItemActive);
        if(index > 0){
            this.selectableItemActive = this.selectableItems[index-1];
            this.selectScrollToActiveItem();
        }
    },
    selectableItemClass(item) {
        let baseClass = 'relative flex items-center h-full py-2 pl-8 cursor-default select-none data-[disabled]:opacity-50 data-[disabled]:pointer-events-none ';
        let colorClass = '';
        switch(item.value) {
            case 'do_now':
                colorClass = 'bg-red-500 text-white';
                break;
            case 'crucial_later':
                colorClass = 'bg-yellow-500 text-white';
                break;
            case 'not_crucial_do_now':
                colorClass = 'bg-green-500 text-white';
                break;
            case 'uncategorized':
                colorClass = 'bg-gray-500 text-white';
                break;
            default:
                colorClass = '';
        }
        // Add condition to retain color if item is the selected one
        if (this.selectedItem && this.selectedItem.value === item.value) {
            colorClass += ' bg-opacity-75'; // Adjust opacity or keep solid color
        }
        return baseClass + colorClass;
    },
    selectedItemClass() {
        if (!this.selectedItem) return ''; // Return a default class or empty string if no item is selected
        switch(this.selectedItem.value) {
            case 'do_now':
                return 'bg-red-500 text-white';
            case 'crucial_later':
                return 'bg-yellow-500 text-white';
            case 'not_crucial_do_now':
                return 'bg-green-500 text-white';
            case 'uncategorized':
                return 'bg-gray-500 text-white';
            default:
                return '';
        }
    },



    selectScrollToActiveItem(){
        if(this.selectableItemActive){
            activeElement = document.getElementById(this.selectableItemActive.value + '-' + this.selectId)
            newScrollPos = (activeElement.offsetTop + activeElement.offsetHeight) - this.$refs.selectableItemsList.offsetHeight;
            if(newScrollPos > 0){
                this.$refs.selectableItemsList.scrollTop=newScrollPos;
            } else {
                this.$refs.selectableItemsList.scrollTop=0;
            }
        }
    },
    selectKeydown(event){
        if (event.keyCode >= 65 && event.keyCode <= 90) {

            this.selectKeydownValue += event.key;
            selectedItemBestMatch = this.selectItemsFindBestMatch();
            if(selectedItemBestMatch){
                if(this.selectOpen){
                    this.selectableItemActive = selectedItemBestMatch;
                    this.selectScrollToActiveItem();
                } else {
                    this.selectedItem = this.selectableItemActive = selectedItemBestMatch;
                }
            }

            if(this.selectKeydownValue != ''){
                clearTimeout(this.selectKeydownClearTimeout);
                this.selectKeydownClearTimeout = setTimeout(() => {
                    this.selectKeydownValue = '';
                }, this.selectKeydownTimeout);
            }
        }
    },
    selectItemsFindBestMatch(){
        typedValue = this.selectKeydownValue.toLowerCase();
        var bestMatch = null;
        var bestMatchIndex = -1;
        for (var i = 0; i < this.selectableItems.length; i++) {
            var title = this.selectableItems[i].title.toLowerCase();
            var index = title.indexOf(typedValue);
            if (index > -1 && (bestMatchIndex == -1 || index < bestMatchIndex) && !this.selectableItems[i].disabled) {
                bestMatch = this.selectableItems[i];
                bestMatchIndex = index;
            }
        }
        return bestMatch;
    },
    selectPositionUpdate(){
        selectDropdownBottomPos = this.$refs.selectButton.getBoundingClientRect().top + this.$refs.selectButton.offsetHeight + parseInt(window.getComputedStyle(this.$refs.selectableItemsList).maxHeight);
        if(window.innerHeight < selectDropdownBottomPos){
            this.selectDropdownPosition = 'top';
        } else {
            this.selectDropdownPosition = 'bottom';
        }
    }
}" x-init="
    $watch('selectOpen', function(){
        if(!selectedItem){
            selectableItemActive=selectableItems[0];
        } else {
            selectableItemActive=selectedItem;
        }
        setTimeout(function(){
            selectScrollToActiveItem();
        }, 10);
        selectPositionUpdate();
        window.addEventListener('resize', (event) => { selectPositionUpdate(); });
    });
" @keydown.escape="if(selectOpen){ selectOpen=false; }"
    @keydown.down="if(selectOpen){ selectableItemActiveNext(); } else { selectOpen=true; } event.preventDefault();"
    @keydown.up="if(selectOpen){ selectableItemActivePrevious(); } else { selectOpen=true; } event.preventDefault();"
    @keydown.enter="selectedItem=selectableItemActive; selectOpen=false;" @keydown="selectKeydown($event);"
    class="relative w-48">

    <label for="datepicker" class="block mb-1 text-sm font-medium  text-neutral-500">Prioritization</label>

    <button x-ref="selectButton" @click="selectOpen=!selectOpen"
        :class="selectedItemClass() + ' additional-classes-for-button'"
        class="border-neutral-300 border relative min-h-[38px] flex items-center justify-between w-full py-2 p-3 text-left rounded-md shadow-sm cursor-default focus:outline-none text-sm">

        <span x-text="selectedItem ? selectedItem.title : 'Priority'" class="truncate">Priority</span>
        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                class="w-5 h-5 text-gray-400">
                <path fill-rule="evenodd"
                    d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                    clip-rule="evenodd"></path>
            </svg>
        </span>
    </button>

    <ul x-show="selectOpen" x-ref="selectableItemsList" @click.away="selectOpen = false"
        x-transition:enter="transition ease-out duration-50" x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100"
        :class="{ 'bottom-0 mb-10' : selectDropdownPosition == 'top', 'top-0 mt-10' : selectDropdownPosition == 'bottom' }"
        class="absolute w-full py-1 mt-1 overflow-auto text-sm bg-white rounded-md shadow-md max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none"
        x-cloak>


        <template x-for="item in selectableItems" :key="item.value">
            <li @click="selectedItem=item; selectOpen=false; $refs.selectButton.focus();"
                :id="item.value + '-' + selectId"
                :class="selectableItemClass(item) + (selectableItems.indexOf(item) === 0 ? ' rounded-t-md' : '') + (selectableItems.indexOf(item) === selectableItems.length - 1 ? ' rounded-b-md' : '')"
                class="...">

                <svg x-show="selectedItem.value==item.value" class="absolute left-0 w-4 h-4 ml-2 stroke-current"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span class="block font-medium truncate" x-text="item.title"></span>
            </li>



        </template>

    </ul>

</div>