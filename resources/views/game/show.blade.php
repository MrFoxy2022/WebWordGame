@extends('layouts.layout')
@section('content')
    <div class="container">
        <h1 class="text-center" style="margin-top: 80px;">Guess The Word</h1>
        @isset($needPassword)
            <form style="width: 50%; margin: 0 auto;" action="{{ route('game.verify', $game->id) }}" method="POST">
                @csrf
                <div class="mb-3" style="font-size: 20px;">
                    <input name="password" placeholder="Enter Password..." type="text" minlength="5" maxlength="20" class="form-control" style="font-size: 20px;">
                    @error('password')
                        <p class="text-danger" style="font-size: 15px;">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark" style="width: 100%; font-size: 20px;">Verify</button>
            </form>
        @else
            <h1 id="win_text" class="text-center text-success {{ $game->status && $result ? '' : 'd-none' }}">YOU WIN</h1>
            <h1 id="win_text" class="text-center text-danger {{ $game->status && $result && $game->attempts == $game->attempt ? '' : 'd-none' }}">YOU LOST</h1>
            @if($result)
                <div id="game" class="mobile-game" data-id="{{ $game->id }}" data-length="{{ strlen($game->word) }}" data-attempts="{{ $game->attempts }}" style="margin: 50px auto;width: 50%;">
                    @for($i = 0; $i < $game->attempts; $i++)
                        <div class="row text-center justify-content-center row-word" style="margin: 0 auto;">
                            @for($j = 0; $j < strlen($game->word); $j++)
                                <div class="col" style="margin: 0; padding: 0;aspect-ratio: 1 / 1;align-self: stretch; height: 33.33333333%;">
                                    <input id="letter-{{ $i * strlen($game->word) + $j + 1 }}" {{ $game->status ? 'disabled' : '' }} @isset($history[$i][$j]) {{ 'disabled' }} @endisset value="@isset($history[$i][$j]) {{ $history[$i][$j] }} @endisset" class="letter bg-dark mobile-game-el @isset($letter[$i][$j]) {{ $letter[$i][$j] }} @else {{ 'text-light' }} @endisset text-center" style="text-transform: uppercase;font-size: 30px;height: 100%;width: 100%;" type="text" maxlength="1">
                                </div>
                            @endfor
                        </div>
                    @endfor
                </div>
            @elseif(!$game->status)
                <h2 class="text-center text-danger">You have already taken the game!</h2>
                <h3 class="text-center"><a href="/games/{{ $current_game }}" style="text-decoration: none; color: deepskyblue;">Give up or end the game</a></h3>
            @else
                <h2 class="text-center text-danger">The game was ended by another user!</h2>
            @endif
        @endisset
    </div>
    @vite(['resources/js/game.js'])
@endsection
