<?php

namespace App\Http\Controllers\Game;


use App\Http\Requests\Game\CheckRequest;

class CheckController extends BaseController
{
    public function __invoke(CheckRequest $request)
    {
        $data = $request->validated();

        return $this->service->checkGame($data);
    }
}
