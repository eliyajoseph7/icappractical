<aside id="logo-sidebar"
    class="fixed top-[3.5rem] left-0 z-40 w-64 h-screen pt-4 transition-transform -translate-x-full bg-gray-50 border-r-8 border-r-sky-50/50 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-[88vh] px-3 pb-4 overflow-y-auto bg-inherit dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 rounded-lg dark:text-white font-normal {{ Route::is('dashboard') ? 'bg-sky-100/20 text-sky-700 font-bold hover:bg-sky-100/80' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/80' }} dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                    </svg>

                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <p class="text-sm text-gray-400 uppercase">Main</p>
    
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <p class="text-sm text-gray-400 uppercase">System</p>
    
                <li>
                    {{-- <a href="{{ route('user_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ Route::is('user_list') || Route::is('sub_category_form') || Route::is('sub_category_form_edit') ? 'bg-sky-100/80 text-sky-900 font-bold hover:bg-sky-100/80' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/80' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Users</span>
                    </a> --}}
                </li>
            </ul>
        </ul>

    </div>
</aside>
