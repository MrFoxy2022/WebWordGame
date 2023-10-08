@extends('layouts.layout')
@section('content')
    <div class="container">
        <h1 style="margin-top: 100px;">Play with bot</h1>
        <a href="{{ route('game.bot') }}"><button class="btn btn-dark" style="font-size: 20px; width: 20%;">Play</button></a>
        <h1 style="margin-top: 20px;">Public Games</h1>
        @if(count($games) == 0)
            <a href="/games/create" style="font-size: 20px; text-decoration: none; color: deepskyblue">Oops. It looks like no one created the game, be the first!</a>
        @endif
        <div>
            @foreach($games as $game)
                <a href="/games/{{ $game->id }}" style="text-decoration: none;">
                    <div class="card bg-dark text-light" style="margin-top: 5px;">
                        <div class="card-body" style="font-size: 20px;">
                            #{{ $game->id }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            {{ $game->game_name }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            Attempts {{ $game->attempts }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            Hints are {{ $game->letter_hints ? 'enabled' : 'disabled' }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div style="margin-top: 15px;">
            {{ $games->links() }}
        </div>
    </div>
@endsection
