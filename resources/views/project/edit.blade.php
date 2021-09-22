<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Project') }}
        </h2>

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">

            <form action="{{ route('project.update', ['id' => $project->id]) }}" method="post">
                @csrf

                <x-jet-label>Title</x-jet-label>

                <x-jet-input class="w-1/2 mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"  name="title" value="{{ $project->title }}">
                </x-jet-input>

                <x-jet-label>Description</x-jet-label>

                <x-jet-input class="w-1/2 mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="description" value="{{ $project->description }}">
                </x-jet-input>

                <x-jet-label>url</x-jet-label>
                <x-jet-input class="w-1/2 mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="url" value="{{ $project->url }}">
                </x-jet-input>

                <x-jet-label>database</x-jet-label>
                <x-jet-input class="w-1/2 mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="database" value="{{ $project->database }}" >
                </x-jet-input>

                <x-jet-label>trello</x-jet-label>
                <x-jet-input class="w-1/2 mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="trello" value="{{ $project->trello }}">
                </x-jet-input>

                <x-jet-label>github</x-jet-label>
                <x-jet-input class="w-1/2 mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="github" value="{{ $project->github }}">
                </x-jet-input>

                <x-jet-label>image</x-jet-label>
                <img src="#" alt="">
                <x-jet-input type="file" class="w-1/2 mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="image">
                </x-jet-input>

                <br>

                <x-jet-button class="bg-green-500"> Atualizar</x-jet-button>

            </form>

        </div>
    </div>


</x-app-layout>
