<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Task Project') }}
        </h2>

    </x-slot>

    <div class="py-6">
        <div class="justify-center mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-green-200 relative text-green-600 py-3 px-3 rounded-lg">
                    {{ session('message') }}
                </div>
                <br>
            @endif
            <form action="{{ route('task.store') }}" method="post">
                @csrf

                <x-jet-label>Task</x-jet-label>
                <x-jet-input class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="task"></x-jet-input>

                <x-jet-label>Description</x-jet-label>
                <x-jet-input class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="description"></x-jet-input>

                <x-jet-label>Project</x-jet-label>
                <select class="custom-select w-full" name='project_id'>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <x-jet-button class="bg-green-500"> Salvar</x-jet-button>
                @if ($projects->count() == 1)
                    <a class="bg-blue-500 text-white px-6 py-2 rounded font-medium mx-3 hover:bg-blue-600 transition duration-200 each-in-out"  href="{{ route('project.show', ['id' => $project->id]) }}"   >Voltar</a>
                @endif

            </form>

        </div>
    </div>


</x-app-layout>
