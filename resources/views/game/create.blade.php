@extends('layouts.layout')
@section('content')
    <div class="container">
        <form style="font-size: 25px; width: 40%; margin: 80px auto;">
            <div class="mb-3">
                <label for="word" class="form-label">Make a word</label>
                <input name="word" type="text" maxlength="20" value="Cucumber" class="form-control" id="word" style="font-size: 20px;">
            </div>
            <div class="mb-3">
                <label for="attempts" class="form-label">Number of attempts</label>
                <input name="attempts" type="number" max="10" min="0" value="5" class="form-control" id="attempts" style="font-size: 20px;">
            </div>
            <div class="row" style="font-size: 20px; margin: 0 auto;">
                <div class="col form-check form-switch">
                    <input name="private_lobby" class="form-check-input" type="checkbox" id="private_lobby">
                    <label class="form-check-label" for="private_lobby">Private lobby</label>
                </div>
                <div class="col form-check form-switch">
                    <div class="float-end">
                        <input checked name="letter_hints" class="form-check-input" type="checkbox" id="letter_hints">
                        <label class="form-check-label" for="letter_hints">Letter hints</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark" style="font-size: 20px; width: 100%;">Create</button>
        </form>
    </div>
@endsection
