<div class="relative">
    <input
            wire:model.debounce.300ms="search"
            type="text"
            class="bg-gray-800 text-sm rounded-full px-3 py-1 w-64 pl-8 focus:outline-none focus:shadow-outline"
            placeholder="Search..">
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="fill-current text-gray-400 w-4" viewBox="0 0 24 24">
            <path class="heroicon-ui"
                  d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/>
        </svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3" style="position: absolute"></div>

    @if(strlen($search) >= 2)
        <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2">
            @if(count($searchResults) > 0)
                <ul>
                    @foreach($searchResults as $game)
                        <li class="border-b border-gray-700">
                            <a href="{{ route('games.show', $game['slug']) }}"
                               class="block hover:bg-blue-700 flex items-center transition ease-in-out duration-150 px-3 py3">
                                @if(isset($game['cover']))
                                    <img src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}"
                                         alt="cover"
                                         class="w-10">
                                @else
                                    <img src="https://via.placeholder.com/264x352" alt="cover">
                                @endif
                                <span class="ml-4">{{$game['name']}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">
                    No results for "{{ $search }}"
                </div>
            @endif
        </div>
    @endif
</div>