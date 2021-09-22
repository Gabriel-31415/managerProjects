<x-app-layout>

    <x-slot name="header">
        <div class="flex ">
            <div class="flex-none w-16 h-16 ">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Command') }}
                </h2>
            </div>
            <div class="flex-grow h-16 ">

            </div>
            <div class="flex-none w-24 h-16 ">
                <x-jet-nav-link href="{{ route('command.create') }}" class="" active>
                    Add Command
                </x-jet-nav-link>
            </div>
          </div>

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">
            @if (session('message'))
                <div class="bg-green-200 relative text-green-600 py-3 px-3 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif
            <br>
            <table class="w-full text-left rounded-lg">
                <thead>
                    <tr class="bg-gray-700 text-gray-200 border border-b-0">
                        <th class="px-4 py-3">project</th>
                        <th class="px-4 py-3">command</th>

                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commands as $command)
                        <tr class="w-full bg-gray-600 text-gray-200 font-light whitespace-no-wrap border border-b-0">
                            <td class="px-4 py-4">{{ $command->project->title }}</td>
                            <td class="px-4 py-4">{{ $command->command }}</td>

                            <td class="text-center">

                                <a href="{{ route('command.edit', ['id' => $command->id]) }}"><span ><i class="text-yellow-400  hover:text-yellow-700 fas fa-edit fa-2x"></i></span></a>
                                <a href="{{ route('command.delete', ['id' => $command->id]) }}"><span ><i class="mr-1 text-red-400  hover:text-red-700 fas fa-times-circle fa-2x"></i></span></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
