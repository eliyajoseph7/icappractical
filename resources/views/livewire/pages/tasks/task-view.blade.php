<div class="relative">
    <x-slot name="header">
        @include('includes.breadcrumb', [
            'main' => 'Tasks',
            'menu' => 'View Task',
        ])
    </x-slot>
    <div class="absolute -top-10 right-4 z-40">
        <a href="{{ route('task_list') }}" class="text-red-500 hover:text-red-700" title="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a>
    </div>
    <div class="bg-gray-50 mt-2 min-h-[70vh]">
        <div class="max-w-8xl mx-auto py-10">
            <div class="bg-white/50 rounded-md p-6">
                <div class="grid grid-cols-1 md:grid-cols-7 gap-y-4">
                    <div class="font-semibold text-gray-700">Task Name:</div>
                    <div class="md:col-span-6 text-gray-900 font-bold">{{ $task->title }}</div>
    
                    <div class="font-semibold text-gray-700">Description:</div>
                    <div class="md:col-span-6 text-gray-900">{{ $task->description }}</div>
    
                    <div class="font-semibold text-gray-700">Due Date:</div>
                    <div class="md:col-span-6 text-gray-900">{{ $task->due_date->format('M d, Y') }}</div>
    
                    <div class="font-semibold text-gray-700">Status:</div>
                    <div class="md:col-span-6 text-gray-900"><span class="{{ $task->status == 'pending' ? 'text-sky-500 bg-sky-100/50' : ($task->status == 'on-progress' ? 'text-teal-500 bg-teal-100/50' : 'text-green-500  bg-green-100/50') }} px-2 py-0.5 rounded-md">{{ $task->status }}</span></div>
    
                    <div class="font-semibold text-gray-700">Created By:</div>
                    <div class="md:col-span-6 text-gray-900">{{ $task->user->name }}</div>
    
                    <div class="font-semibold text-gray-700">Created At:</div>
                    <div class="md:col-span-6 text-gray-900">{{ $task->created_at->format('M d, Y') }}</div>
                </div>
            </div>
        </div>

    </div>
</div>
