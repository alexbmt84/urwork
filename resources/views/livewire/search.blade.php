<div class="flex flex-col relative"
     x-data="{ open: true }"
     x-on:click="open = true"
     x-on:click.away="open = false; @this.resetIndex();"
     x-on:keydown.escape="open = false; @this.resetIndex();">

    <input type="text" class="bg-gray-200 text-gray-700 border-2 focus:outline-none placeholder-gray-500 px-2 py-1 rounded-full mr-3" placeholder="Rechercher une mission"
           wire:model="query"
           wire:keydown.prevent.arrow-down="incrementIndex()"
           wire:keydown.prevent.arrow-up="decrementIndex()"
           wire:keydown.prevent.enter="selectIndex()"
           wire:keydown.backspace="resetIndex()">

    <i class='bx bx-search absolute text-gray-700 top-0 right-0 mr-4 mt-2.5'></i>

    @if (strlen($query) >= 2)

        <div class="z-10 bg-white border border-gray-400 rounded w-56 px-2 py-1 mt-10 right-0 flex flex-col absolute" x-show="open">

            @if (count($jobs) > 0)
                @foreach ($jobs as $index => $job)
                    <a href="#" class=" {{ ($index === $selectedIndex) ? 'text-green-400' : '' }} my-2 p-1 font-semibold">{{ $job['title'] }}</a>
                @endforeach
            @else
                <span class="text-pink-500 font-semibold">0 résultat pour "{{ $query }}"</span>
            @endif

        </div>

    @endif

</div>
