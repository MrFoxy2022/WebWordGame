<?php

namespace App\Services\Game;

use App\Http\Requests\Game\VerifyRequest;
use App\Http\Resources\Game\GameResource;
use App\Models\Game;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Service
{
    public function store($data): void
    {
        $data['private_lobby'] = isset($data['private_lobby']);
        $data['letter_hints'] = isset($data['letter_hints']);

        if ($data['private_lobby']) {
            $data['password'] = Hash::make($data['password']);
        }
        else {
            $data['password'] = null;
        }

        Game::create($data);
    }

    public function occupyGame(Request $request, Game $game, $verified): array
    {
        $current_hash = $request->session()->get('hash_player');
        $current_game = Game::query()->where('hash_player', $current_hash)->where('status', 0)->first();

        if (isset($current_hash) && $current_hash[0] == $game->hash_player) {
            return [true, null, null];
        }
        else if ($game->private_lobby && !$verified) {
            return [false, null, true];
        }
        else if ($current_game == null || !isset($current_hash)) {
            $hash = isset($request->session()->get('hash_player')[0]) ? $request->session()->get('hash_player')[0] : null;
            if ($hash == $game->hash_player || $game->hash_player == null) {
                if ($hash == null) {
                    $hash = Hash::make(Str::random(10));
                }
                $game->update(['hash_player' => $hash]);
                $request->session()->push('hash_player', $hash);

                return [true, null, null];
            }
            else if ($request->get('hash') == $game->hash_player && $current_game != null) {
                return [$current_game->id, true];
            }
            return [false, null, null];
        }

        return [false, $current_game->id, null];
    }

    public function checkGame($data): GameResource
    {
        $game = Game::findOrFail($data['id']);
        $word = strtoupper($game->word);

        if ($game->attempt == $game->attempts) {
            $data['status'] = 'error';
            $game->update([
                'status' => true
            ]);
        }
        else if ($word == $data['word']) {
            $data['status'] = 'win';
            $game->update([
                'status' => true,
                'attempt' => $game->attempt + 1,
                'history' => $game->getHistory($data['word'])
            ]);
        }
        else {
            $data['status'] = 'ok';
            for ($i = 0; $i < strlen($data['word']); $i++) {
                if (!$game->letter_hints) {
                    $data['letter'][$i] = 0;
                }
                else if ($data['word'][$i] == $word[$i]) {
                    $data['letter'][$i] = 2;
                }
                else if (str_contains($word, $data['word'][$i])) {
                    $data['letter'][$i] = 1;
                }
                else {
                    $data['letter'][$i] = 0;
                }
            }
            $game->update([
                'attempt' => $game->attempt + 1,
                'history' => $game->getHistory($data['word'])
            ]);
        }

        return new GameResource($data);
    }
    public function verifyGame(VerifyRequest $request, $id, $data) {
        $game = Game::findOrFail($id);

        if ($game->private_lobby) {
            if (Hash::check($data['password'], $game->password)) {
                $this->occupyGame($request, $game, true);
            }
        }
    }
}
