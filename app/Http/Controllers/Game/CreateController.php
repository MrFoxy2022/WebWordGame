<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateController extends BaseController
{
    public function __invoke(Request $request): View
    {
        $status = $request->get('status');
        $id = $request->get('id');

        return view('game.create', compact('status', 'id'));
    }
}
