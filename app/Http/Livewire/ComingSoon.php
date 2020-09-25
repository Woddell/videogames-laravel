<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class ComingSoon extends Component
{

    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;

        $comingSoonUnformatted = Http::withHeaders(config('services.igdb'))
            ->withOptions(
                [
                    'body' => "
                        fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating, summary;
                        where platforms = (48,49,130,6)
                        & (
                            first_release_date >= {$current}
                            & popularity > 5
                        );
                        sort first_release_date asc;
                        limit 4;
                    "
                ]
            )
            ->get(
                'https://api-v3.igdb.com/games'
            )
            ->json();

        $this->comingSoon = $this->formatForView($comingSoonUnformatted);
    }
    public function render()
    {
        return view('livewire.coming-soon');
    }

    private function formatForView(array $games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge(
                [
                    'coverImageUrl' => Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']),
                    'releaseDate' => \Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y')
                ]
            );
        });
    }
}
