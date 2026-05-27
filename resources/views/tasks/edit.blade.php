<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Edit Task
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded-xl shadow-sm">

               @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors-all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form method="POST" action="{{ route('tasks.update', $task->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700 font-medium">
                            Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ $task->title }}"
                            class="w-full border border-gray-300 rounded-lg p-2"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700 font-medium">
                            Description
                        </label>

                        <textarea
                            name="description"
                            class="w-full border border-gray-300 rounded-lg p-2"
                            rows="4"
                        >{{ $task->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700 font-medium">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full border border-gray-300 rounded-lg p-2"
                        >
                            <option value="pending"
                                {{ $task->status == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="completed"
                                {{ $task->status == 'completed' ? 'selected' : '' }}>
                                Completed
                            </option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-1 text-gray-700 font-medium">
                            Due Date
                        </label>

                        <input
                            type="date"
                            name="due_date"
                            value="{{ $task->due_date }}"
                            class="w-full border border-gray-300 rounded-lg p-2"
                        >
                    </div>

                    <div class="flex gap-2">

                        <button
                            type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg"
                        >
                            Update Task
                        </button>

                        <a href="{{ route('tasks.index') }}"
                           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>