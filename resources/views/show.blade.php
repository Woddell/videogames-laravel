@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ $game['coverImageUrl'] }}" alt="cover">
            </div>
            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-2">{{$game['name']}}</h2>
                <div class="text-gray-400">
                    <span>
                        {{ $game['genres'] }}
                    </span>
                    &middot;
                    <span>
                        {{ $game['involvedCompanies'] }}
                    </span>
                    &middot;
                    <span>
                        {{ $game['platforms'] }}
                    </span>
                </div>
                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                {{ $game['memberRating'] }}
                            </div>
                        </div>
                        <div class="ml-4 text-xs">Member <br/> Score</div>
                    </div>
                    <div class="flex items-center ml-12">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                {{ $game['criticRating'] }}
                            </div>
                        </div>
                        <div class="ml-4 text-xs">Critic <br/> Score</div>
                    </div>
                </div>
                <p class="mt-12">
                    {{$game['summary']}}
                </p>

                <div class="mt-12">
                    <a href="{{ $game['trailer'] }}" class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <span class="ml-2">Play Trailer</span>
                    </a>
                </div>
            </div>
        </div> <!-- end game details -->
        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                Images
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach($game['screenshots'] as $screenshot)
                    <div>
                        <a href="{{ $screenshot['huge'] }}">
                            <img src="{{ $screenshot['big'] }}" alt=""
                                 class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>
        </div> <!-- end images container -->
        <div class="similar-games-container mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                Similar Games
            </h2>
            <div class="similar-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @foreach($game['similarGames'] as $game)
                    <div class="game mt-8">
                        <div class="relative inline-block">
                            <a href="{{route('games.show', $game['slug'])}}">
                                <img src="{{ $game['coverImageUrl'] }}"
                                     alt="game cover"
                                     class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            @if ($game['rating'])
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                                     style="right:-20px; bottom: -20px"
                                >
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        {{ $game['rating'] }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                            {{$game['name']}}
                        </a>
                        <div class="text-gray-400 mt-1">
                            {{ $game['platforms'] }}
                        </div>
                    </div>
                @endforeach()
            </div>
        </div> <!-- end similar games -->
    </div>
@endsection