<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Problem') }}
        </h2>

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">

            <form action="{{ route('problem.update', ['id' => $problem->id]) }}" method="post">
                @csrf
                <x-jet-label>Problem</x-jet-label>
                <textarea name="problem" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4">{{ $problem->problem }}</textarea>

                <x-jet-label>Resolved</x-jet-label>
                <input type="checkbox" @if($problem->resolved) checked @endif class=" mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="resolved" >


                <br>

                <x-jet-button class="bg-green-500"> Atualizar</x-jet-button>

            </form>

        </div>
    </div>


</x-app-layout>
