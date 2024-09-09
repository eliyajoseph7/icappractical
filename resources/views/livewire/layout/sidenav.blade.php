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
                <p class="text-sm text-gray-400 uppercase">
                <Main></Main>
                </p>

                <li>
                    <a href="{{ route('task_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ in_array(Route::currentRouteName(), ['task_list', 'task_form', 'task_form_edit', 'task_view']) ? 'bg-sky-100/80 text-sky-900 font-bold hover:bg-sky-100/80' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/80' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Tasks</span>
                    </a>
                </li>
            </ul>
        </ul>

    </div>
</aside>
