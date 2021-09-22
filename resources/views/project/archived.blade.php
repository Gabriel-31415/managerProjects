<x-app-layout>

    <x-slot name="header">
        <div class="flex ">
            <div class="flex-none w-16 h-16 ">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Projects') }}
                </h2>
            </div>

          </div>

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class=" px-4 py-3 my-2 text-gray-700">
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($projects as $item)
                        <div>
                            <x-card-removed :item="$item" class="bg-red-900">
                                {{ $item->title }}
                            </x-card>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


</x-app-layout>
