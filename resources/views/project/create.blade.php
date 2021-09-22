<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Project') }}
        </h2>

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">

            <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div >
                        <x-jet-label>Title</x-jet-label>
                        <x-jet-input class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="title">
                        </x-jet-input>
                    </div>
                    <div >
                        <x-jet-label>Description</x-jet-label>
                        <x-jet-input class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="description">
                        </x-jet-input>
                    </div>
                    <div >
                        <x-jet-label>url</x-jet-label>
                        <x-jet-input class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="url">
                        </x-jet-input>
                    </div>
                    <div >
                        <x-jet-label>database</x-jet-label>
                        <x-jet-input class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="database">
                        </x-jet-input>
                    </div>
                    <div >
                        <x-jet-label>trello</x-jet-label>
                        <x-jet-input class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="trello">
                        </x-jet-input>
                    </div>
                    <div >
                        <x-jet-label>github</x-jet-label>
                        <x-jet-input class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="github">
                        </x-jet-input>
                    </div>
                    <div >
                        <x-jet-label>image</x-jet-label>
                        <input type="file" class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="image">
                    </div>
                  </div>

                <br>
                <br>

                <x-jet-button class="bg-green-500"> Salvar</x-jet-button>

            </form>

        </div>
    </div>


</x-app-layout>
