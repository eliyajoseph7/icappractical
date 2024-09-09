<div>
    <x-slot name="header">
        @include('includes.breadcrumb', [
            'main' => '',
            'menu' => 'Tasks Management',
        ])
    </x-slot>
    <div>
        <div class="py-0">
            <div class="max-w-full mx-auto sm:px-6 lg:px-0">
                <div class="w-full pt-3">
                    <div class="flex justify-end pb-2">
                        <a href="{{ route('task_form') }}"
                            class="items-center space-x-0.5 text-gray-600 hover:text-gray-500 bg-gray-50 hover:bg-white shadow-sm hover:shadow-md px-2 border-2 border-gray-200 py-1 rounded-lg">
                            <i class="fa-solid fa-plus-circle"></i>
                            <span class="">{{ __('Add Task') }}</span>
                        </a>

                    </div>
                    <div class="flex flex-col-reverse md:flex-row md:space-x-3">
                        <div
                            class="min-h-[20vh] dark:bg-gray-800 overflow-hidden sm:rounded-lg items-center w-full float-right">

                            <div class="bg-gray-50 shadow-lg border-t-2 border-gray-100 rounded-lg px-2 py-3">
                                <div class="flex items-center justify-between d p-4 dark:bg-gray-700">
                                    <div class="flex">
                                        <div class="relative w-full">
                                            <input type="text" wire:model.live.debounce.300ms="search"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                                placeholder="Search" required="">
                                        </div>
                                    </div>
                                    <div class="">
                                        {{-- <button wire:click="exportExcel"
                                        class="flex space-x-1 items-center text-green-500 bg-gray-50 hover:bg-grey-100 hover:text-green-700 px-3 py-0.5 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>
                                                <span>Export Excel</span>
                                        </button> --}}
                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table
                                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400 dark:bg-gray-700">
                                        <thead
                                            class="text-md text-gray-700 dark:text-gray-100 bg-gray-100 dark:bg-gray-800">
                                            <tr>
                                                <th scope="col" class="px-4 py-3 w-[50px]">S/No.</th>
                                                @include('includes.table-header-sort', [
                                                    'name' => 'title',
                                                    'displayName' => 'Title',
                                                ])
                                                @include('includes.table-header-sort', [
                                                    'name' => 'description',
                                                    'displayName' => 'Description',
                                                    'colspan' => 4,
                                                ])
                                                @include('includes.table-header-sort', [
                                                    'name' => 'due_date',
                                                    'displayName' => 'Due Date',
                                                ])
                                                @include('includes.table-header-sort', [
                                                    'name' => 'created_at',
                                                    'displayName' => 'Created At',
                                                ])
                                                @include('includes.table-header-sort', [
                                                    'name' => 'status',
                                                    'displayName' => 'Status',
                                                ])
                                                @include('includes.table-header-sort', [
                                                    'name' => 'user_id',
                                                    'displayName' => 'Created By',
                                                ])
                                                <th scope="col" class="px-4 py-3 w-[100px]">
                                                    Remaining Days
                                                </th>
                                                <th scope="col" class="px-4 py-3 w-[100px] float-end">
                                                    <span class="sr-only">Actions</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="[&>*:nth-child(even)]:bg-[#F6F9FF] [&>*:nth-child(even)]:dark:bg-gray-600">
                                            @forelse ($data as $dt)
                                                <tr wire:key="{{ $dt->id }}"
                                                    class="border-b border-gray-100 dark:border-gray-700">
                                                    <th scope="row"
                                                        class="px-4 py-3 w-[50px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $loop->iteration }}</th>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        {{ Str::limit($dt->title, 20, '...') }}</td>
                                                    <td colspan="4" class="px-4 py-3 whitespace-nowrap">
                                                        {{ Str::limit($dt->description, 50, '...') }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        {{ $dt->due_date?->format('M d, Y') }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        {{ $dt->created_at->format('M d, Y') }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        <span
                                                            class="{{ $dt->status == 'pending' ? 'text-sky-500 bg-sky-100/50' : ($dt->status == 'on-progress' ? 'text-teal-500 bg-teal-100/50' : 'text-green-500  bg-green-100/50') }} px-2 py-0.5 rounded-md">{{ $dt->status }}</span>
                                                    </td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        {{ $dt->user?->name }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        {{ $dt->remain_days }}</td>
                                                    <td class="px-4 py-3 flex items-center justify-end space-x-1">
                                                        <a title="View" href="{{ route('task_view', $dt->id) }}"
                                                            class="px-1 bg-gray-300 hover:bg-blue-700 text-white rounded">
                                                            <i class="fa fa-eye"></i></a>

                                                        <a title="Update" href="{{ route('task_form_edit', $dt->id) }}"
                                                            class="px-1 bg-gray-300 hover:bg-blue-700 text-white rounded">
                                                            <i class="fa fa-edit"></i></a>

                                                        <button title="Delete"
                                                            wire:click="$dispatch('confirm_delete', {{ $dt->id }})"
                                                            class="px-2.5 bg-gray-300 hover:bg-red-500 text-white rounded">x</button>
                                                        @if ($dt->status != 'completed')
                                                            <button title="Mark as completed"
                                                                wire:click="$dispatch('confirm_task_completion', {{ $dt->id }})"
                                                                class="px-2.5 text-gray-700 hover:text-green-500 rounded">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="size-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                                </svg>
                                                            </button>
                                                        @else
                                                            <button title="Mark as completed"
                                                                class="px-2.5 text-gray-700 hover:text-gray-500 rounded cursor-not-allowed">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="size-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                                </svg>
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="bg-gray-50">
                                                    <td class="py-2" colspan="50">
                                                        <div class="flex justify-center">There is nothing currently
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                                @include('includes.table_pages', [
                                    'data' => $data,
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @if (session()->has('info'))
        <script>
            document.addEventListener('livewire:init', () => {
                Toast.fire({
                    icon: '{{ session('info.type') }}',
                    title: '{{ session('info.message') }}',
                });
            })
        </script>
    @endif
    <script data-navigate-once>
        document.addEventListener('livewire:init', () => {
            // delete
            Livewire.on('confirm_delete', (id) => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete_task', {
                            'id': id
                        });
                    }
                });
            });

            // mark as completed
            Livewire.on('confirm_task_completion', (id) => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "This task will be marked as completed!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, it's completed!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('complete_task', {
                            'id': id
                        });
                    }
                });
            });
        })
    </script>
</div>
