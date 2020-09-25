@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}" alt="cover">
            </div>
            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-2">{{$game['name']}}</h2>
                <div class="text-gray-400">
                    <span>
                        @foreach($game['genres'] as $genre)
                            {{$genre['name']}},
                        @endforeach
                    </span>
                    &middot;
                    @if(array_key_exists('involved_companies', $game))
                    <span>
                        {{$game['involved_companies'][0]['company']['name']}}
                    </span>
                    &middot;
                    @endif
                    <span>
                        @foreach($game['platforms'] as $platform)
                            @if(array_key_exists('abbreviation', $platform))
                                {{ $platform['abbreviation']}},
                            @endif
                        @endforeach
                    </span>
                </div>
                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                @if(array_key_exists('rating', $game))
                                    {{ round($game['rating']).'%' }}
                                @else
                                    0%
                                @endif
                            </div>
                        </div>
                        <div class="ml-4 text-xs">Member <br/> Score</div>
                    </div>
                    <div class="flex items-center ml-12">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                @if(array_key_exists('aggregated_rating', $game))
                                    {{ round($game['aggregated_rating']).'%' }}
                                @else
                                    0%
                                @endif
                            </div>
                        </div>
                        <div class="ml-4 text-xs">Critic <br/> Score</div>
                    </div>
                </div>
                <p class="mt-12">
                    {{$game['summary']}}
                </p>

                <div class="mt-12">
                    <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <span class="ml-2">Play Trailer</span>
                    </button>
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
                        <a href="{{Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url'])}}">
                            <img src="{{Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url'])}}" alt=""
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
                @foreach($game['similar_games'] as $game)
                    <div class="game mt-8">
                        <div class="relative inline-block">
                            @if(array_key_exists('cover', $game))
                                <a href="{{route('games.show', $game['slug'])}}">
                                    <img src="{{Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}"
                                         alt="game cover"
                                         class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            @endif
                            @if (isset($game['rating']))
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                                     style="right:-20px; bottom: -20px"
                                >
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        {{round($game['rating']).'%'}}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                            {{$game['name']}}
                        </a>
                        <div class="text-gray-400 mt-1">
                            @if(array_key_exists('platforms', $game))
                                @foreach($game['platforms'] as $platform)
                                    @if(array_key_exists('abbreviation', $platform))
                                        {{ $platform['abbreviation']}},
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach()
            </div>
        </div> <!-- end similar games -->
    </div>
@endsection