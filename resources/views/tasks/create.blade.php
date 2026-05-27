<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Create Task
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors-all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1">Title</label>
                        <input type="text" name="title" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Description</label>
                        <textarea name="description" class="w-full border rounded p-2"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Status</label>
                        <select name="status" class="w-full border rounded p-2">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Due Date</label>
                        <input type="date" name="due_date" class="w-full border rounded p-2">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Save Task
                    </button>

                    <a href="{{ route('tasks.index') }}" class="ml-2 text-gray-600">
                        Cancel
                    </a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>