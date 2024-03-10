<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <div x-data="{
        slideOverOpen: false
    }" class="relative z-40 w-auto h-auto">
        <button @click="slideOverOpen=true"
            class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors bg-white border rounded-md hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
        {{-- <template x-teleport="body"> --}}
            <div x-show="slideOverOpen" @keydown.window.escape="slideOverOpen=false" class="relative z-[99]">
                <div x-show="slideOverOpen" x-transition.opacity.duration.600ms @click="slideOverOpen = false"
                    class="fixed inset-0 bg-black bg-opacity-10"></div>
                <div class="fixed inset-0 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="fixed inset-y-0 left-0 flex max-w-full">
                            <div x-show="slideOverOpen" @click.away="slideOverOpen = false"
                                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                                class="w-screen max-w-md">
                                <div
                                    class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-r shadow-lg border-neutral-100/70">
                                    <div class="px-4 sm:px-5">
                                        <div class="flex items-start justify-between pb-1">
                                            <h2 class="text-base font-semibold leading-6 text-gray-900"
                                                id="slide-over-title">Tall To Do</h2>
                                            <div class="flex items-center h-auto ml-3">
                                                <button @click="slideOverOpen=false"
                                                    class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    <span>Close</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative z-50 flex-1 px-4 mt-5 sm:px-5">
                                        <div class="absolute inset-0 px-4 sm:px-5">
                                            <div
                                                class="relative h-full overflow-visible border border-dashed rounded-md border-neutral-300">

                                                {{-- Navigation Links, please add --}}
                                                <div class="flex flex-col items-start justify-between h-full">
                                                    <div class="flex flex-col items-start justify-start w-full">
                                                        {{-- dashboard --}}
                                                        <a href="{{ route('dashboard') }}"
                                                            class="flex items-center w-full px-4 py-2 text-sm font-medium text-gray-900 rounded-md dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 dark:focus:ring-indigo-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                            </svg>

                                                            <span class="ml-2">Dashboard</span>
                                                        </a>
                                                        {{-- Search --}}
                                                        <div class="flex flex-col items-start justify-start w-full">
                                                            @livewire('components.search-to-do')
                                                        </div>

                                                        {{-- today --}}
                                                        <a href="{{ route('to-do-today') }}"
                                                            class="flex items-center w-full px-4 py-2 text-sm font-medium text-gray-900 rounded-md dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 dark:focus:ring-indigo-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                                            </svg>

                                                            <span class="ml-2">Today</span>
                                                        </a>
                                                        {{-- All task --}}
                                                        <a href="{{ route('to-do') }}"
                                                            class="flex items-center w-full px-4 py-2 text-sm font-medium text-gray-900 rounded-md dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 dark:focus:ring-indigo-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                                                            </svg>


                                                            <span class="ml-2">All Task</span>
                                                        </a>
                                                    </div>


                                                    <!-- User Settings Dropdown -->
                                                    <div class="p-3 sm:flex sm:items-center sm:ml-6">
                                                        <x-dropdown align="left" width="92">
                                                            <x-slot name="trigger">
                                                                <button
                                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                                                    <div>{{ Auth::user()->name }}</div>

                                                                    <div class="ml-1">
                                                                        <svg class="w-4 h-4 fill-current"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 20 20">
                                                                            <path fill-rule="evenodd"
                                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                            </x-slot>

                                                            <x-slot name="content">
                                                                <x-dropdown-link :href="route('profile.edit')">
                                                                    {{ __('Profile') }}
                                                                </x-dropdown-link>

                                                                <!-- Authentication -->
                                                                <form method="POST" action="{{ route('logout') }}">
                                                                    @csrf

                                                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                                        {{ __('Log Out') }}
                                                                    </x-dropdown-link>
                                                                </form>
                                                            </x-slot>
                                                        </x-dropdown>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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