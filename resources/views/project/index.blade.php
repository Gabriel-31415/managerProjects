<x-app-layout>

    <x-slot name="header">
        <div class="flex ">
            <div class="flex-none w-16 h-16 ">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Projects') }}
                </h2>
            </div>
            <div class="flex-grow h-16 ">

            </div>
            <div class="flex-none w-24 h-16 ">
                <x-jet-nav-link href="{{ route('project.create') }}" class="" active>
                    Add Project
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
            <div x-data={selected:1}>
                <p class="flex justify-center">
                    <a x-on:click.prevent=" selected = 1 " class="bg-blue-600 text-white rounded hover:bg-blue-800 px-4 py-3 cursor-pointer focus:outline-none mr-2">
                        To do
                    </a>
                    <a x-on:click.prevent="selected = 2 " class="bg-yellow-600 text-white rounded hover:bg-yellow-800 px-4 py-3 cursor-pointer focus:outline-none mr-2">
                        Doing
                    </a>
                    <a x-on:click.prevent="selected = 3 " class="bg-green-600 text-white rounded hover:bg-green-800 px-4 py-3 cursor-pointer focus:outline-none mr-2">
                        Done
                    </a>
                </p>

                <div x-show="selected === 1" x-transition class=" px-4 py-3 my-2 text-gray-700">
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($todo as $item)
                            <div>
                                <x-card :item="$item" class="bg-blue-900">
                                    {{ $item->title }}
                                </x-card>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div x-show="selected === 2" x-transition class=" px-4 py-3 my-2 text-gray-700">
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($doing as $item)
                            <div>
                                <x-card :item="$item" class="bg-yellow-900" >
                                    {{ $item->title }}
                                </x-card>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div x-show="selected === 3" class=" px-4 py-3 my-2 text-gray-700">
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($done as $item)
                            <div>
                                <x-card :item="$item" class="bg-green-900">
                                    {{ $item->title }}
                                </x-card>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
