<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropdown;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropdownTest extends TestCase
{
    /** @test */
    public function the_search_dropdown_searches_for_games()
    {
        Http::fake(
            [
                'https://api-v3.igdb.com/games' => $this->fakeSearchGames()
            ]
        );

        Livewire::test(SearchDropdown::class)
            ->assertDontSee('call of duty')
            ->set('search', 'call of duty modern warfare')
            ->assertSee('Call of Duty 4: Modern Warfare')
            ->assertSee('Call of Duty: Modern Warfare 2');
    }

    private function fakeSearchGames()
    {
        return Http::response(
            [
                0 => [
                    "id" => 623,
                    "cover" => [
                        "id" => 88872,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1wko.jpg",
                    ],
                    "name" => "Call of Duty 4: Modern Warfare",
                    "slug" => "call-of-duty-4-modern-warfare",
                ],
                1 => [
                    "id" => 559,
                    "cover" => [
                        "id" => 88891,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1wl7.jpg",
                    ],
                    "name" => "Call of Duty: Modern Warfare 2",
                    "slug" => "call-of-duty-modern-warfare-2",
                ],
            ],
            \Illuminate\Http\Response::HTTP_OK
        );
    }
}
