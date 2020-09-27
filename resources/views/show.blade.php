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
                        <div id="memberRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                            @push('scripts')
                                @include('partials._rating', [
                                    'slug' => 'memberRating',
                                    'rating' => $game['memberRating'],
                                    'event' => null,
                                ])
                            @endpush
                        </div>
                        <div class="ml-4 text-xs">Member <br/> Score</div>
                    </div>
                    <div class="flex items-center ml-12">
                        <div id="criticRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                            @push('scripts')
                                @include('partials._rating', [
                                    'slug' => 'criticRating',
                                    'rating' => $game['criticRating'],
                                    'event' => null,
                                ])
                            @endpush
                        </div>
                        <div class="ml-4 text-xs">Critic <br/> Score</div>
                    </div>
                </div>
                <p class="mt-12">
                    {{$game['summary']}}
                </p>

                <div class="mt-12" x-data="{ isTrailerModalVisible: false }">
                    <button
                            class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded
                            transition ease-in-out duration-150"
                            @click="isTrailerModalVisible = true"
                    >
                        <span class="ml-2">Play Trailer</span>
                    </button>

                    <template x-if="isTrailerModalVisible">
                        <div
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                                class="text-3xl leading-none hover:text-gray-300"
                                                @click="isTrailerModalVisible = false"
                                                @keydown.escape.window="isTrailerModalVisible = false"
                                        >&times;
                                        </button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative"
                                             style="padding-top: 56.25%;">
                                            <iframe src="{{ $game['trailer'] }}"
                                                    width="560"
                                                    height="315"
                                                    class="responsive-frame absolute top-0 left-0 w-full h-full"
                                                    style="border: 0;"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen
                                            >
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div> <!-- end game details -->
        <div class="images-container border-b border-gray-800 pb-12 mt-8"
             x-data="{ isImageModalVisible: false, image: ''}">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                Images
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach($game['screenshots'] as $screenshot)
                    <div>
                        <a
                                href="#"
                                @click.prevent="
                                isImageModalVisible = true
                                image='{{ $screenshot['big'] }}'
                            "
                        >
                            <img src="{{ $screenshot['big'] }}" alt=""
                                 class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>
            <template x-if="isImageModalVisible">
                <div
                        style="background-color: rgba(0, 0, 0, .5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                >
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button
                                        class="text-3xl leading-none hover:text-gray-300"
                                        @click="isImageModalVisible = false"
                                        @keydown.escape.window="isImageModalVisible = false"
                                >
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <img :src="image" alt="screenshot">
                            </div>
                        </div>
                    </div>
                </div>
            </template>


        </div> <!-- end images container -->
        <div class="similar-games-container mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                Similar Games
            </h2>
            <div class="similar-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @foreach($game['similarGames'] as $game)
                    <x-game-card :game="$game"/>
                @endforeach()
            </div>
        </div> <!-- end similar games -->
    </div>
@endsection