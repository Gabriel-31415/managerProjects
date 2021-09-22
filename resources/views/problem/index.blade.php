<x-app-layout>

    <x-slot name="header">
        <div class="flex ">
            <div class="flex-none w-16 h-16 ">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ __('Problem') }}
                </h2>
            </div>
            <div class="flex-grow h-16 ">

            </div>
            <div class="flex-none w-24 h-16 ">
                <x-jet-nav-link href="{{ route('problem.create') }}" class="" active>
                    Add Problem
                </x-jet-nav-link>
            </div>
          </div>

    </x-slot>

    <div class="py-6">
        <div class="justify-center mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-green-200 relative text-green-600 py-3 px-3 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif
            <br>
            <div class="block m-6 overflow-x-auto">
                <table class="w-full text-left rounded-lg">
                    <thead>
                        <tr class="text-gray-200 bg-gray-700 border border-b-0">
                            <th class="px-4 py-3">Problem</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($problems as $problem)
                            <tr class="w-full font-light text-gray-200 whitespace-no-wrap bg-gray-600 border border-b-0">
                                <td class="px-4 py-4">{{ $problem->problem }}</td>
                                <td class="px-4 py-4">
                                    @if ($problem->resolved)
                                        <span class="px-2 py-1 text-sm text-white bg-blue-500 rounded-full">Revolved</span>
                                    @else
                                        <span class="px-2 py-1 text-sm text-white bg-yellow-500 rounded-full">Unresolved</span>
                                    @endif

                                </td>
                                <td class="text-center">
                                    <a href="{{ route('problem.updateStatus', ['id' => $problem->id]) }}"><span ><i class="mr-2 text-blue-400  hover:text-blue-700 fas fa-arrow-circle-right fa-2x"></i></span></a>
                                    <a href="{{ route('problem.edit', ['id' => $problem->id]) }}"><span ><i class=" text-yellow-400  hover:text-yellow-700 fas fa-edit fa-2x"></i></span></a>
                                    <a href="{{ route('problem.delete', ['id' => $problem->id]) }}"><span ><i class="mr-1 text-red-400  hover:text-red-700 fas fa-times-circle fa-2x"></i></span></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>
