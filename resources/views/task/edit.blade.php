<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">

            <form action="{{ route('task.update', ['id' => $task->id]) }}" method="post">
                @csrf

                <x-jet-label>Title</x-jet-label>

                <x-jet-input class="w-1/2 mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="task" value="{{ $task->task }}">
                </x-jet-input>

                <x-jet-label>Description</x-jet-label>

                <x-jet-input class="w-1/2 mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="description" value="{{ $task->description }}">
                </x-jet-input>
                <br>

                <x-jet-button class="bg-green-500"> Atualizar</x-jet-button>

            </form>

        </div>
    </div>


</x-app-layout>
