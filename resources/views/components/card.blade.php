<div {{ $attributes->merge(['class' => 'h-full p-6 shadow-xl rounded-md']) }} >
    <div class="flex flex-col ...">
        {{-- <div>
            <h2 class="mb-8 text-xs font-semibold tracking-widest text-white uppercase title-font">
                great info right here
            </h2>
        </div> --}}
        <div>
            <h4 class="mb-8 text-2xl font-semibold leading-none tracking-tighter text-white lg:text-3xl title-font ">
                {{ $slot }}
            </h4>
        </div>
        <div class="flex-grow h-16 ">
            <p class="mb-3 text-base leading-relaxed truncate text-white">
                {{ $item->description }}
            </p>
        </div>
        <div>
            <div class="flex flex-wrap justify-between">
                <a href="{{ route('project.show', ['id' => $item->id]) }}" class="inline-flex items-center h-8 px-4 m-2 text-sm text-white transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800" title="read more">
                    Ver
                </a>
                <a href="{{ route('project.edit', ['id'=> $item->id]) }}" class="inline-flex items-center h-8 px-4 m-2 text-sm text-white transition-colors duration-150 bg-yellow-700 rounded-lg focus:shadow-outline hover:bg-yellow-800" title="read more">
                    Edit
                </a>
                <a href="{{ route('project.delete', ['id'=> $item->id]) }}" class="inline-flex items-center h-8 px-4 m-2 text-sm text-white transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800" title="read more">
                    Delete
                </a>
                <a href="{{ route('project.updateStatus', ['id' => $item->id]) }}" class="inline-flex items-center h-8 px-4 m-2 text-sm text-white transition-colors duration-150 bg-purple-700 rounded-lg focus:shadow-outline hover:bg-purple-800" title="read more">
                    status
                    <i class="fas fa-arrow-circle-right ml-1"></i>
                </a>
            </div>
        </div>
      </div>
</div>




