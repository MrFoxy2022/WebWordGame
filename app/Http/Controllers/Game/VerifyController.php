<?php

namespace App\Http\Controllers\Game;


use App\Http\Requests\Game\VerifyRequest;

class VerifyController extends BaseController
{
    public function __invoke(VerifyRequest $request, $id)
    {

        $data = $request->validated();

        $this->service->verifyGame($request, $id, $data);

        return redirect()->route('game.show', $id);
    }
}
