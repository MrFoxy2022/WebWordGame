<?php

namespace App\Http\Controllers\Game;


use App\Models\Game;
use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(): View
    {
        $games = Game::query()->where('private_lobby', false)->where('hash_player', null)->paginate(8);
        return view('game.index', compact('games'));
    }
}
