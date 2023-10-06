<?php

namespace App\Http\Controllers\Game;

use Illuminate\View\View;

class CreateController extends BaseController
{
    public function __invoke(): View
    {
        return view('game.create');
    }
}
