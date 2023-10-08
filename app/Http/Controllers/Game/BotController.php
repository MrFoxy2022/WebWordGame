<?php

namespace App\Http\Controllers\Game;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BotController extends BaseController
{
    public function __invoke(Faker $faker)
    {
        $response = Http::withHeaders(['X-Api-Key' => 'NmxihqvIfizEeK0w9XZwXw==KMsohdSoLh1daoGB'])->get('https://api.api-ninjas.com/v1/randomword');

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
        if ($statusCode == 200) {
            $data = [
                'game_name' => (string)Str::uuid(),
                'word' => $responseBody['word'],
                'attempts' => 5,
                'letter_hints' => 1,
            ];
            $id = $this->service->store($data);

            return redirect()->route('game.show', $id);
        }
    }
}
