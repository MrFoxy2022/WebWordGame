@extends('layouts.layout')
@section('content')
    <div class="container">
        <h1 class="text-center" style="margin-top: 80px;">Guess the Word</h1>
        <p class="text-center text-main" style="font-size: 20px; width: 40%; margin: 20px auto;">
            “Guess the Word” is a fun game for attentiveness and ingenuity, in which you have to guess the encrypted words. The rules of the game are simple: you are given several attempts, during which you have to guess as many words as possible. After each of your answers, the program checks its correctness and marks the correct letters in their place in green, the correct letters are not in their place in yellow, and the incorrect ones are dark. If you do not guess the word in the allotted number of attempts, you will lose. But do not worry, because with each new word your skills improve!
        </p>
    </div>
@endsection
