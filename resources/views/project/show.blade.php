<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Show Project') }}
        </h2>

    </x-slot>

    <div class="py-6">
        <div class="justify-center mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="h-full p-6 shadow-xl">
                <div class="flex flex-col ">
                    <div>
                        <div class="flex">
                            <div class="flex-1 ">
                                <div class="flex flex-wrap">
                                    <div class="flex-none w-full">
                                        <h4 class="mb-8 text-2xl font-semibold leading-none tracking-tighter text-black lg:text-3xl title-font ">
                                            <select class="appearance-none rounded " name='project_id' onchange="location = this.value;">
                                                @foreach ($projects as $p)
                                                    <option @if ($project->id == $p->id ) selected @endif value="{{ route('project.show', ['id' => $p->id]) }}">{{ $p->title }}</option>
                                                @endforeach
                                            </select>

                                        </h4>
                                    </div>
                                    <div class="flex-initial ">
                                        <p class="mb-2 text-base leading-relaxed text-blueGray-500">
                                            <a class="underline mr-2" @if ($project->url) href="{{ $project->url }}" @endif   target="_blank"><i class="fas fa-link fa-lg"></i></a>
                                            <a class="underline mr-2" @if ($project->trello) href="{{ $project->trello }}"  @endif  target="_blank"><i class="fab fa-trello fa-lg"></i></a>
                                            <a class="underline mr-2"  @if ($project->github) href="{{ $project->github }}" @endif target="_blank"><i class="fab fa-github fa-lg"></i></a>
                                            <a class="underline mr-2" @if ($project->database) href="{{ $project->database }}" @endif  target="_blank"><i class="fas fa-database fa-lg"></i></a>
                                        </p>
                                        <p class="mb-1 text-base leading-relaxed text-blueGray-500">
                                        </p>
                                        <p class="mb-1 text-base leading-relaxed text-blueGray-500">
                                        </p>
                                        <p class="mb-3 text-base leading-relaxed truncate text-blueGray-500">
                                            {{ $project->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-none  w-64 h-64">
                                <img src="{{  asset('storage/'.$project->image) }}"  alt="">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div x-data={select:1}>
                            <p class="flex">
                                <button  @click="select=1" class="px-4 py-3 text-sm text-white bg-blue-600 rounded hover:bg-blue-500 focus:outline-none" type="button">
                                    Tasks
                                </button>
                                <x-jet-nav-link href="{{ route('task.create', ['project_id' => $project->id]) }}" class="" active>
                                    <i class="fas fa-plus-circle"></i>
                                </x-jet-nav-link>
                                <button  @click="select=2" class="px-4 py-3 text-sm text-white bg-blue-600 rounded hover:bg-blue-500 focus:outline-none ml-2" type="button">
                                    Annotations
                                </button>
                                <x-jet-nav-link href="{{ route('annotation.create', ['project_id' => $project->id]) }}" class="" active>
                                    <i class="fas fa-plus-circle"></i>
                                </x-jet-nav-link>
                                <button  @click="select=3" class="px-4 py-3 text-sm text-white bg-blue-600 rounded hover:bg-blue-500 focus:outline-none ml-2" type="button">
                                    Commands
                                </button>
                                <x-jet-nav-link href="{{ route('command.create', ['project_id' => $project->id]) }}" class="" active>
                                    <i class="fas fa-plus-circle"></i>
                                </x-jet-nav-link>
                                <button  @click="select=4" class="px-4 py-3 text-sm text-white bg-blue-600 rounded hover:bg-blue-500 focus:outline-none ml-2" type="button">
                                    Problems
                                </button>
                                <x-jet-nav-link href="{{ route('problem.create', ['project_id' => $project->id]) }}" class="" active>
                                    <i class="fas fa-plus-circle"></i>
                                </x-jet-nav-link>
                            </p>

                            <div x-show="select == 1" class="px-4 py-3 my-2 text-gray-700 ">
                                @foreach ($taks as $task)
                                    <div class="w-full px-2 pt-3 bg-white rounded-lg shadow mb-2">
                                        <div class="flex items-center">
                                            <div class="flex-none w-32 h-16 ">
                                                <a href="#" >
                                                    {{ $task->task }}
                                                </a>
                                            </div>
                                            <div class="flex-grow h-16 ">
                                                <h2 class="font-bold text-gray-700 my-0">{{ $task->description }}</h2>
                                            </div>
                                            <div class="flex-none h-16 px-2 pt-1">
                                                <h2 class="font-bold text-gray-700 my-0">{{  date('d/m/Y', strtotime($task->created_at ))  }}</h2>
                                            </div>
                                            <div class="flex-none w-24 h-16 ">
                                                <a href="{{ route('task.delete', ['id' => $task->id]) }}"><span ><i class="mr-1 text-red-400  hover:text-red-700 fas fa-times-circle fa-2x"></i></span></a>
                                                <a href="{{ route('task.updateStatus', ['id' => $task->id]) }}"><span ><i class="mr-2 text-blue-400  hover:text-blue-700 fas fa-arrow-circle-right fa-2x"></i></span></a>
                                            </div>
                                            @if ($task->status == 'todo')
                                                <div class="flex-none w-16 h-16 ">
                                                    <span class="bg-blue-400 text-gray-100 text-xs px-2 py-1 rounded-full">{{ $task->status }}</span>
                                                </div>
                                            @elseif($task->status == 'doing')
                                                <div class="flex-none w-16 h-16 ">
                                                    <span class="bg-yellow-400 text-gray-100 text-xs px-2 py-1 rounded-full">{{ $task->status }}</span>
                                                </div>
                                            @else
                                                <div class="flex-none w-16 h-16 ">
                                                    <span class="bg-green-400 text-gray-100 text-xs px-2 py-1 rounded-full">{{ $task->status }}</span>
                                                </div>
                                            @endif
                                            


                                        </div>
                                    </div>

                                @endforeach
                            </div>
                            <div x-show="select == 2" class="px-4 py-3 my-2 text-gray-700 ">
                                @foreach ($project->annotations as $annotation)
                                <div class="w-full px-2">
                                    <div class="bg-white px-4 py-4 flex my-2 rounded-lg shadow">
                                        <div class="w-full pr-5">
                                            <a href="#" class="mb-4">
                                                {{ $annotation->annotation }}
                                            </a>
                                        </div>

                                    </div>
                                </div>

                                @endforeach
                            </div>
                            <div x-show="select == 3" class="px-4 py-3 my-2 text-gray-700 ">
                                @foreach ($project->commands as $command)
                                <div class="w-full px-2">
                                    <div class="bg-white px-4 py-4 flex my-2 rounded-lg shadow">
                                        <div class="w-1/2 pr-5">
                                            <div class="select-all">
                                                {{ $command->command }}
                                            </div>

                                        </div>
                                        <div class="flex-1">
                                            <h2 class="font-bold text-gray-700 my-0">{{ $command->description }}</h2>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            <div x-show="select == 4" class="px-4 py-3 my-2 text-gray-700 ">
                                @foreach ($project->problems as $problem)
                                <div class="w-full px-2">
                                    <div class="bg-white px-4 py-4 flex my-2 rounded-lg shadow">
                                        <div class="w-10/12 pr-5">

                                            <a href="#" class="mb-4">
                                                {{ $problem->problem }}
                                            </a>
                                        </div>
                                        <div class="w-1/12">
                                            <h2 class="font-bold text-{{ $problem->resolved ? "green" : "red" }}-700 my-0">{{ $problem->resolved ? "Resolved" : "Unresolved" }}</h2>
                                        </div>
                                        <div class="w-1/12 pl-7">
                                            <a href="{{ route('problem.updateStatus', ['id' => $problem->id]) }}"><span ><i class="mr-2 text-blue-400  hover:text-blue-700 fas fa-arrow-circle-right fa-2x"></i></span></a>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-app-layout>
