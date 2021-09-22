<x-app-layout>

    <x-slot name="header">
        <div class="flex ">
            <div class="flex-none w-16 h-16 ">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Annotations') }}
                </h2>
            </div>
            <div class="flex-grow h-16 ">

            </div>
            <div class="flex-none w-24 h-16 ">
                <x-jet-nav-link href="{{ route('annotation.create') }}" class="" active>
                    Add Annotation
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
                        <th class="px-4 py-3">Project</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($annotations as $annotation)
                        <tr class="w-full bg-gray-600 text-gray-200 font-light whitespace-no-wrap border border-b-0">
                            <td class="px-4 py-4">{{ $annotation->project->title }}</td>
                            <td class="px-4 py-4">{{ $annotation->annotation }}</td>

                            <td class="text-center">
                                <a href="{{ route('annotation.edit', ['id' => $annotation->id]) }}"><span ><i class="text-yellow-400  hover:text-yellow-700 fas fa-edit fa-2x"></i></span></a>
                                <a href="{{ route('annotation.delete', ['id' => $annotation->id]) }}"><span ><i class="text-red-400  hover:text-red-700 fas fa-times-circle fa-2x"></i></span></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
