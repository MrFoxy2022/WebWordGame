@extends('layouts.layout')
@section('content')
    <div class="container">
        <form style="font-size: 25px; width: 40%; margin: 80px auto;" class="row-word" action="{{ route('game.store') }}" method="POST">
            @if($status == 'success')
                <p style="font-size: 18px; padding: 0; margin-bottom: 0;">You have successfully created the game!</p>
                <p id="copy_game" data-link="{{ route('game.show', $id) }}" style="color: deepskyblue; cursor: pointer; font-size: 18px; padding: 0; margin-bottom: 20px;">Your link: {{ route('game.show', $id) }}</p>
            @endif
            @csrf
            <div class="mb-3">
                <label for="game_name" class="form-label">Name of the game</label>
                <input name="game_name" type="text" minlength="2" maxlength="20" value="{{ old('game_name') ? old('game_name') : 'Game' }}" class="form-control" id="game_name" style="font-size: 20px;">
                @error('game_name')
                    <p class="text-danger" style="font-size: 15px;">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="word" class="form-label">Make a word</label>
                <input name="word" type="text" minlength="2" maxlength="20" value="{{ old('word') ? old('word') : 'Cucumber' }}" class="form-control" id="word" style="font-size: 20px;">
                @error('word')
                    <p class="text-danger" style="font-size: 15px;">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="attempts" class="form-label">Number of attempts</label>
                <input name="attempts" type="number" max="10" min="1" value="{{ old('attempts') ? old('attempts') : '5' }}" class="form-control" id="attempts" style="font-size: 20px;">
                @error('attempts')
                    <p class="text-danger" style="font-size: 15px;">{{ $message }}</p>
                @enderror
            </div>
            <div class="row" style="font-size: 20px; margin: 0 auto;">
                <div class="col form-check form-switch">
                    <input {{ old('private_lobby') ? 'checked' : '' }} name="private_lobby" class="form-check-input" type="checkbox" value="1" id="private_lobby">
                    <label class="form-check-label" for="private_lobby">Private lobby</label>
                </div>
                <div class="col form-check form-switch">
                    <div class="float-end">
                        <input {{ old('letter_hints') ? 'checked' : (old('letter_hints') == null ? 'checked' : '') }} name="letter_hints" class="form-check-input" type="checkbox" value="1" id="letter_hints">
                        <label class="form-check-label" for="letter_hints">Letter hints</label>
                    </div>
                </div>
            </div>
            <div id="password_view" class="mb-3 d-none">
                <label for="password" class="form-label">Enter password</label>
                <input name="password" type="text" minlength="5" maxlength="20" class="form-control" id="password" style="font-size: 20px;">
                @error('password')
                <p class="text-danger" style="font-size: 15px;">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark" style="font-size: 20px; width: 100%;">Create</button>
        </form>
    </div>
    @vite(['resources/js/game.js'])
@endsection
