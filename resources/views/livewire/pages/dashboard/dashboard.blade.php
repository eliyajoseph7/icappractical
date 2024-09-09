<div class="mt-4 md:mt-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="bg-gray-50 rounded-md h-20 items-center">
            <a href="{{ route('task_list') }}">
                <div class="flex justify-between items-center p-3">
                    <div class="text-md font-bold text-gray-700">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                        </div>
                        <div class="mt-0.5">Total Tasks</div>
                    </div>
                    <div class="">
                        <div class="font-bold text-gray-700 text-transparent">Total</div>
                        <div class="text-sky-700 font-bold text-2xl">{{ $total }}</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="bg-gray-50 rounded-md h-20 items-center">
            <div class="flex justify-between items-center p-3">
                <div class="text-md font-bold text-gray-700">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                    <div class="mt-0.5">Tasks Onprogress</div>
                </div>
                <div class="">
                    <div class="font-bold text-gray-700 text-transparent">Onprogress</div>
                    <div class="text-blue-700 font-bold text-2xl">{{ $onprogress }}</div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 rounded-md h-20 items-center">
            <div class="flex justify-between items-center p-3">
                <div class="text-md font-bold text-gray-700">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>
                    </div>
                    <div class="mt-0.5">Completed Tasks</div>
                </div>
                <div class="">
                    <div class="font-bold text-gray-700 text-transparent">Completed</div>
                    <div class="text-green-700 font-bold text-2xl">{{ $completed }}</div>
                </div>
            </div>
        </div>
        <div class="">
            @livewire('pages.dashboard.charts.task-summary')
        </div>
    </div>
</div>
