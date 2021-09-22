<div {{ $attributes->merge(['class' => 'h-full p-6 shadow-xl rounded-md']) }} >
    <div class="flex flex-col ...">

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
                <a href="{{ route('project.restore', ['id' => $item->id]) }}" class="inline-flex items-center h-8 px-4 m-2 text-sm text-white transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800" title="read more">
                    Restaurar
                </a>

            </div>
        </div>
      </div>
</div>




