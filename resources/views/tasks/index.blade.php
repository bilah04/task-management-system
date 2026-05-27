<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 dark:text-gray-100 leading-tight">
            Task Management
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                 
                <div class="mb-6">
                    <a href="/tasks/create"
    
                    class="inline-block bg-blue-500 text-white font-bold px-4 py-2 rounded mb-4">
                    + Add Task
                    </a>
                </div>

                 @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 tect-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="GET" action="{{ route('tasks.index') }}" class="mb-6 flex gap-2">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Seach task title..."
                           class="border border-gray-300 rounded px-3 py-2 w-full"
                    >

                    <select name="status" class="border border-gray-300 rounded px-5 py-2">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>
                            Completed
                        </option>
                    </select>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Search
                    </button>

                    <a href="{{ route('tasks.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        Clear
                    </a>
                    
                </form>

                <div class="mt-6 space-y-4">
                    @forelse($tasks as $task)

                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
                            <div class="flex items-start justify-between">
                                <div>   
                                    <h3 class="text-lg font-bold text-gray-800">
                                        {{ $task->title }}
                                    </h3>

                                    <p class="text-gray-600 mt-2">
                                        {{ $task->description }}
                                    </p>
                                </div>
                                    
                                <div>
                                    @if($task->status == 'pending')
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">
                                            Pending
                                        </span>
                                    @else
                                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                                            Completed
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <div class="text-sm text-gray-500">            
                                    @if($task->due_date)
                                        Due Date:
                                        <span class="font-medium text-gray-700">
                                            {{ $task->due_date }}
                                        </span>
                                    @endif
                                </div>    

                                <div class="flex gap-2">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')

                                    <button 
                                        type="submit"
                                        onclick="return confirm('Are you sure you want to delete this task?')"
                                        class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded">
                                        Delete
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                    @empty

                        <div class="bg-white border border-gray-200 rounded-xl p-6 text-center text-gray-500">
                            No tasks found
                        </div>

                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>