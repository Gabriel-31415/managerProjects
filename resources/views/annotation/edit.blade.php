<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Annotation') }}
        </h2>

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">

            <form action="{{ route('annotation.update', ['id' => $annotation->id]) }}" method="post">
                @csrf

                <x-jet-label>Annotation</x-jet-label>
                <textarea name="annotation" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4">{{ $annotation->annotation }}</textarea>


                <br>

                <x-jet-button class="bg-green-500"> Atualizar</x-jet-button>

            </form>

        </div>
    </div>


</x-app-layout>
