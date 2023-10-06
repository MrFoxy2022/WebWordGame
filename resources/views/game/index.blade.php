@extends('layouts.layout')
@section('content')
    <div class="container">
        <h1 style="margin-top: 100px;">Public Games</h1>
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
