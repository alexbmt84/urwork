<div>
    <div class="px-4 py-4 mb-3 shadow-sm hover:shadow-md border-2 rounded border-gray-300 hover:border-green-300">

        <div class="flex flex-row">

            <a href="{{ route('jobs.show', $job->id) }}">
                <h2 class="text-xl font-bold text-green-800">{{ $job-> title }}</h2>
            </a>

            @if($job->isLiked())

                <a class="mt-1 ml-2 cursor-pointer" wire:click="addLike">

                    <i class='bx bxs-heart bx-sm text-pink-400 hover:text-pink-400'></i>

                </a>

            @else

                <a class="mt-1 ml-2 cursor-pointer" wire:click="addLike">

                    <i class='bx bx-heart bx-sm text-green-800 hover:text-pink-400'></i>

                </a>

            @endif

        </div>

        <p class="text-base font-semibold text-gray-700 mt-2">{{ $job->description }}</p>

        <div class="flex items-center">

            <span class="h-2 w-2 bg-green-500 rounded-lg mr-1"></span>
            <a href="{{ route('jobs.show', $job->id) }}" class="font-bold py-2">Consulter la mission</a>

        </div>

        <span class="text-sm text-pink-400 font-bold">{{ number_format($job->price / 100, 2, ',', ' ') }} €</span>

    </div>
</div>
