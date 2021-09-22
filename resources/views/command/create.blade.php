<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Command') }}
        </h2>

    </x-slot>

    <div class="py-6">
        <div class="justify-center mx-auto max-w-7xl sm:px-6 lg:px-8">

            <form action="{{ route('command.store') }}" method="post">
                @csrf

                <x-jet-label>Command</x-jet-label>
                <x-jet-input name="command" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"></x-jet-input>

                <x-jet-label>Description</x-jet-label>
                <x-jet-input name="description" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"></x-jet-input>

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
