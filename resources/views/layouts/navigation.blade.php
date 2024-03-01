<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex gap-4">

                {{-- Left Hamburger Menu --}}
                <div class="z-50 flex items-center shrink-0">

                    
                    <livewire:components.slide-nav />
                </div>

                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-1">
                        <x-application-logo class="w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
                        <span class="font-medium">Task Manager</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</nav>
