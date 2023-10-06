<?php

namespace App\Http\Controllers\Game;


use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends BaseController
{
    public function __invoke(Request $request, $id) : View
    {
        $game = Game::findOrFail($id);

        list($history, $letter) = $game->getHistoryAndHintsLetters($game);
        list($result, $current_game, $needPassword) = $this->service->occupyGame($request, $game, false);

        return view('game.show', compact('game', 'current_game', 'result', 'history', 'letter', 'needPassword'));
    }
}
