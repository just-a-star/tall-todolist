<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}


    <div x-data="filterDate() " x-init="
      currentDate = new Date();

      if (datePickerValue) {
          currentDate = new Date(Date.parse(datePickerValue));
      }
      datePickerMonth = currentDate.getMonth();
      datePickerYear = currentDate.getFullYear();
      datePickerDay = currentDate.getDay();
      datePickerValue = datePickerFormatDate( currentDate );
      datePickerCalculateDays();
  " x-cloak>
        <div class="container mx-auto ">
            <div class="w-full p-0 m-0 mb-5">
                {{-- <label for="datepicker" class="block mb-1 text-sm font-medium text-neutral-500">Select Date</label>
                --}}
                <div class="relative w-[17rem] p-0">
                    <input x-ref="datePickerInput" type="text" @click="datePickerOpen=!datePickerOpen"
                        x-model="datePickerValue" x-on:keydown.escape="datePickerOpen=false"
                        class="flex w-full h-10 px-3 py-2 bg-white border-none text-md text-neutral-800 border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="Select date" readonly />
                    {{-- Hidden inputs for binding due dates filter with livewire --}}
                    <input type="hidden" wire:model="startDate"
                        x-bind:value="startDate ? startDate.toISOString().split('T')[0] : null">
                    <input type="hidden" wire:model="endDate"
                        x-bind:value="endDate ? endDate.toISOString().split('T')[0] : null">
                    <div x-on:date-picked.window="datePicked"></div>
                    <div @click="datePickerOpen=!datePickerOpen; if(datePickerOpen){ $refs.datePickerInput.focus() }"
                        class="absolute top-0 right-0 px-3 py-2 cursor-pointer text-neutral-400 hover:text-neutral-500">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div x-show="datePickerOpen" x-transition @click.away="datePickerOpen = false"
                        class="absolute top-0 left-0 max-w-lg p-4 mt-12 antialiased bg-white border-none rounded-lg shadow w-[17rem] border-neutral-200/70">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <span x-text="datePickerMonthNames[datePickerMonth]"
                                    class="text-lg font-bold text-gray-800"></span>
                                <span x-text="datePickerYear" class="ml-1 text-lg font-normal text-gray-600"></span>
                            </div>
                            <div>
                                <button @click="datePickerPreviousMonth()" type="button"
                                    class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100">
                                    <svg class="inline-flex w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button @click="datePickerNextMonth()" type="button"
                                    class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100">
                                    <svg class="inline-flex w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="grid grid-cols-7 mb-3">
                            <template x-for="(day, index) in datePickerDays" :key="index">
                                <div class="px-0.5">
                                    <div x-text="day" class="text-xs font-medium text-center text-gray-800"></div>
                                </div>
                            </template>
                        </div>
                        <div class="grid grid-cols-7">
                            <template x-for="blankDay in datePickerBlankDaysInMonth">
                                <div class="p-1 text-sm text-center border border-transparent"></div>
                            </template>
                            <template x-for="(day, dayIndex) in datePickerDaysInMonth" :key="dayIndex">
                                <div class="px-0.5 mb-1 aspect-square">
                                    <div x-text="day" @click="datePickerDayClicked(day)" :class="{
                                        'bg-neutral-200': datePickerIsToday(day),
                                        'text-gray-600 hover:bg-neutral-200': !datePickerIsToday(day) && !datePickerIsInRange(day),
                                        'bg-neutral-800 text-white hover:bg-opacity-75': datePickerIsInRange(day)
                                    }"
                                        class="flex items-center justify-center text-sm leading-none text-center rounded-full cursor-pointer h-7 w-7">
                                    </div>
                                </div>
                            </template>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>