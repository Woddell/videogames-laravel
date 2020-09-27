<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewGameTest extends TestCase
{
    /** @test */
    public function the_game_page_shows_correct_game_info()
    {
        Http::fake(
            [
                'https://api-v3.igdb.com/games' => $this->fakeSingleGame()
            ]
        );

        $response = $this->get(route('games.show', 'factorio'));

        $response->assertSuccessful();
        $response->assertSee('Factorio');
    }

    private function fakeSingleGame()
    {
        return Http::response(
            [
                0 => [
                    "id" => 7046,
                    "aggregated_rating" => 91.0,
                    "cover" => [
                        "id" => 84814,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1tfy.jpg"
                    ],
                    "first_release_date" => 1597363200,
                    "genres" => [
                        0 => [
                            "id" => 13,
                            "name" => "Simulator"
                        ],
                        1 => [
                            "id" => 15,
                            "name" => "Strategy",
                        ],
                        2 => [
                            "id" => 32,
                            "name" => "Indie"
                        ],
                    ],
                    "involved_companies" => [
                        0 => [
                            "id" => 62694,
                            "company" => [
                                "id" => 14951,
                                "name" => "Wube Software LTD.",
                            ]
                        ]
                    ],
                    "name" => "Factorio",
                    "platforms" => [
                        0 => [
                            "id" => 3,
                            "abbreviation" => "Linux"
                        ],
                        1 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        2 => [
                            "id" => 14,
                            "abbreviation" => "Mac"
                        ]
                    ],
                    "popularity" => 25.964027503787,
                    "rating" => 84.12,
                    2070508768,
                    "screenshots" => [
                        0 => [
                            "id" => 5478,
                            "game" => 7046,
                            "height" => 720,
                            "image_id" => "vvabkqjy3oqqwpzkpvui",
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/vvabkqjy3oqqwpzkpvui.jpg",
                            "width" => 1280,
                            "checksum" => "ecd17f55-a369-1953-61fc-5986ce5653f8",
                        ],
                        1 => [
                            "id" => 5479,
                            "game" => 7046,
                            "height" => 720,
                            "image_id" => "ocnossdjhjbn2hnyt94i",
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/ocnossdjhjbn2hnyt94i.jpg",
                            "width" => 1280,
                            "checksum" => "4ac38b88-539b-29f9-5fd6-344a7fe8b69c",
                        ],
                        2 => [
                            "id" => 5480,
                            "game" => 7046,
                            "height" => 720,
                            "image_id" => "igshvctpdy43mkqobqym",
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/igshvctpdy43mkqobqym.jpg",
                            "width" => 1280,
                            "checksum" => "75f911d7-e31f-5c7f-ca19-62e369abdb21",
                        ],
                        3 => [
                            "id" => 5481,
                            "game" => 7046,
                            "height" => 720,
                            "image_id" => "uicifsgis59lesepotmx",
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/uicifsgis59lesepotmx.jpg",
                            "width" => 1280,
                            "checksum" => "ceaf980e-3d75-4efb-030b-ab46b57b37c5",
                        ],
                        4 => [
                            "id" => 5482,
                            "game" => 7046,
                            "height" => 720,
                            "image_id" => "xjhuh72qle22knkpucty",
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/xjhuh72qle22knkpucty.jpg",
                            "width" => 1280,
                            "checksum" => "a51c83b2-7648-da34-c83c-efe4183eab21",
                        ]
                    ],
                    "similar_games" => [
                        0 => [
                            "id" => 9789,
                            "cover" => [
                                "id" => 71529,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1j6x.jpg"
                            ],
                            "name" => "RimWorld",
                            "platforms" => [
                                0 => [
                                    "id" => 3,
                                    "abbreviation" => "Linux"
                                ],
                                1 => [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                2 => [
                                    "id" => 14,
                                    "abbreviation" => "Mac"
                                ]
                            ],
                            "rating" => 89.604423369511,
                            "slug" => "rimworld"
                        ],
                        1 => [
                            "id" => 132,
                            00,
                            "cover" => [
                                "id" => 75997,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1mn1.jpg"
                            ],
                            "name" => "Planetbase",
                            "platforms" => [
                                0 => [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                1 => [
                                    "id" => 14,
                                    "abbreviation" => "Mac"
                                ],
                                2 => [
                                    "id" => 49,
                                    "abbreviation" => "XONE"
                                ]
                            ],
                            "rating" => 75.525398956035,
                            "slug" => "planetbase"
                        ],
                        2 => [
                            "id" => 171,
                            11,
                            "cover" => [
                                "id" => 112951,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2f5j.jpg",
                            ],
                            "name" => "Imagine Earth",
                            "platforms" => [
                                0 => [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ]
                            ],
                            "rating" => 60.0,
                            "slug" => "imagine-earth"
                        ],
                        3 => [
                            "id" => 171,
                            30,
                            "cover" => [
                                "id" => 82164,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rec.jpg",
                            ],
                            "name" => "Unclaimed World",
                            "platforms" => [
                                0 => [
                                    "id" => 6,
                                    "abbreviation" => "PC",
                                ]
                            ],
                            "rating" => 50.0,
                            "slug" => "unclaimed-world",
                        ],
                        4 => [
                            "id" => 193,
                            01,
                            "cover" => [
                                "id" => 44842,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/eg5t3vhswymoecvbxc8g.jpg",
                            ],
                            "name" => "The Long Journey Home",
                            "platforms" => [
                                0 => [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                1 => [
                                    "id" => 14,
                                    "abbreviation" => "Mac"
                                ],
                                2 => [
                                    "id" => 48,
                                    "abbreviation" => "PS4"
                                ],
                                3 => [
                                    "id" => 49,
                                    "abbreviation" => "XONE"
                                ]
                            ],
                            "rating" => 56.885216543732,
                            "slug" => "the-long-journey-home",
                        ],
                        5 => [
                            "id" => 26145,
                            "cover" => [
                                "id" => 82163,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1reb.jpg"
                            ],
                            "name" => "Impact Winter",
                            "platforms" => [
                                0 => [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                1 => [
                                    "id" => 48,
                                    "abbreviation" => "PS4"
                                ],
                                2 => [
                                    "id" => 49,
                                    "abbreviation" => "XONE"
                                ]
                            ],
                            "rating" => 69.954904171364,
                            "slug" => "impact-winter",
                        ],
                        6 => [
                            "id" => 26574,
                            "cover" => [
                                "id" => 82161,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1re9.jpg"
                            ],
                            "name" => "Force of Nature",
                            "platforms" => [
                                0 => [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ]
                            ],
                            "rating" => 60.0,
                            "slug" => "force-of-nature",
                        ],
                        7 => [
                            "id" => 33153,
                            "cover" => [
                                "id" => 76093,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1mpp.jpg",
                            ],
                            "name" => "Judgment: Apocalypse Survival Simulation",
                            "platforms" => [
                                0 => [
                                    "id" => 6,
                                    "abbreviation" => "PC",
                                ]
                            ],
                            "rating" => 80.0,
                            "slug" => "judgment-apocalypse-survival-simulation",
                        ],
                        8 => [
                            "id" => 348,
                            23,
                            "cover" => [
                                "id" => 82228,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rg4.jpg",
                            ],
                            "name" => "Sol 0: Mars Colonization",
                            "platforms" => [
                                0 => [
                                    "id" => 3,
                                    "abbreviation" => "Linux",
                                ],
                                1 => [
                                    "id" => 6,
                                    "abbreviation" => "PC",
                                ],
                                2 => [
                                    "id" => 14,
                                    "abbreviation" => "Mac",
                                ]
                            ],
                            "rating" => 60.0,
                            "slug" => "sol-0-mars-colonization",
                        ],
                    ],
                    "slug" => "factorio",
                    "summary" => "You will be mining resources, researching technologies, building infrastructure, automating production and fighting enemies. Use your imagination to design your factory, combine simple elements into ingenious structures, apply management skills to keep it working and finally protect it from the creatures who don't really like you.",
                    "videos" => [
                        0 => [
                            "id" => 31204,
                            "game" => 7046,
                            "name" => "Trailer",
                            "video_id" => "DR01YdFtWFI",
                            "checksum" => "91c59b5e-43b4-2bf9-4cde-103c72db7f44",
                        ],
                        1 => [
                            "id" => 31205,
                            "game" => 7046,
                            "name" => "Trailer",
                            "video_id" => "KVvXv1Z6EY8",
                            "checksum" => "0632d80a-dd35-9681-fb05-2af7c80313ff",
                        ]
                    ],
                    "websites" => [
                        0 => [
                            "id" => 41699,
                            "category" => 13,
                            "game" => 7046,
                            "trusted" => true,
                            "url" => "https://store.steampowered.com/app/427520",
                            "checksum" => "bb6b965e-decb-d54f-ddfe-c56a0435fca8",
                        ],
                        1 => [
                            "id" => 73172,
                            "category" => 3,
                            "game" => 7046,
                            "trusted" => true,
                            "url" => "https://en.wikipedia.org/wiki/Factorio",
                            "checksum" => "065f5fb8-ccfb-9b32-0d12-6fcf52c2dc73",
                        ],
                        2 => [
                            "id" => 73173,
                            "category" => 9,
                            "game" => 7046,
                            "trusted" => true,
                            "url" => "https://www.youtube.com/user/factoriovideos",
                            "checksum" => "fe9471a1-ac1e-f911-3dbe-3dc1a676f409",
                        ],
                        3 => [
                            "id" => 118895,
                            "category" => 17,
                            "game" => 7046,
                            "trusted" => true,
                            "url" => "https://www.gog.com/game/factorio",
                            "checksum" => "cebf1f36-33f6-7c59-8a62-ce5fb17ac4e2",
                        ],
                        4 => [
                            "id" => 123413,
                            "category" => 1,
                            "game" => 7046,
                            "trusted" => false,
                            "url" => "https://www.factorio.com/",
                            "checksum" => "6ac2c40d-9ca7-5db3-0ab4-4e8a461315f4",
                        ],
                        5 => [
                            "id" => 123414,
                            "category" => 2,
                            "game" => 7046,
                            "trusted" => false,
                            "url" => "https://wiki.factorio.com/",
                            "checksum" => "d11ae921-3272-c2e5-e8db-7d50ae1ae8c1",
                        ],
                        6 => [
                            "id" => 123415,
                            "category" => 4,
                            "game" => 7046,
                            "trusted" => true,
                            "url" => "https://www.facebook.com/Factorio",
                            "checksum" => "97334d08-111e-ec54-1e02-859328d52bc6",
                        ],
                        7 => [
                            "id" => 123416,
                            "category" => 5,
                            "game" => 7046,
                            "trusted" => true,
                            "url" => "https://twitter.com/factoriogame",
                            "checksum" => "e1f0111c-9c51-9b23-809d-7364c5d6dcfd",
                        ],
                        8 => [
                            "id" => 123417,
                            "category" => 14,
                            "game" => 7046,
                            "trusted" => true,
                            "url" => "https://www.reddit.com/r/factorio",
                            "checksum" => "d95af3de-3d00-f779-7927-bf7d19d98bf2",
                        ]
                    ]
                ]
            ],
            \Illuminate\Http\Response::HTTP_OK
        );
    }
}
