<?php

namespace App\Http\Controllers\Game;

use App\Http\Requests\Game\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('game.index');
    }
}
