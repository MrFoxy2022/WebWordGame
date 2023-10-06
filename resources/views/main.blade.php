@extends('layouts.layout')
@section('content')
    <div class="container">
        <p class="text-center text-main row-word start-word" style="font-size: 23px; width: 40%; margin: 150px auto 0; line-height: 30px;"><b>“Guess The Word”</b> is a fun game for attentiveness and ingenuity, in which you have to guess the encrypted words.</p>
        <p class="text-main row-word" style="font-size: 23px; width: 60%; margin: 20px auto;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The rules of the game are simple: </p>
        <hr class="row-word" style="width: 60%; margin: 0 auto 20px;">
        <div class="row align-items-center row-word" style="font-size: 23px; width: 60%; margin: 5px auto; padding: 0;">
            <p class="col align-middle" style="padding: 0; flex: 0 0 auto; width: 25px; height: 100%; line-height: 100%;">★&nbsp;&nbsp;</p>
            <p class="col" style="padding: 0; line-height: 30px;">You are given several attempts, during which you have to guess as many words as possible.<br></p>
        </div>
        <hr class="row-word" style="width: 60%; margin: 0 auto 20px;">
        <div class="row align-items-center row-word" style="font-size: 23px; width: 60%; margin: 5px auto; padding: 0;">
            <p class="col align-middle" style="padding: 0; flex: 0 0 auto; width: 25px; height: 100%; line-height: 100%;">★&nbsp;&nbsp;</p>
            <p class="col" style="padding: 0; line-height: 30px;">After each of your answers, the program checks its correctness and marks the correct letters in their place in green, the correct letters are not in their place in yellow, and the incorrect ones are dark.<br></p>
        </div>
        <hr class="row-word" style="width: 60%; margin: 0 auto 20px;">
        <div class="row align-items-center row-word" style="font-size: 23px; width: 60%; margin: 5px auto; padding: 0;">
            <p class="col align-middle" style="padding: 0; flex: 0 0 auto; width: 25px; height: 100%; line-height: 100%;">★&nbsp;&nbsp;</p>
            <p class="col" style="padding: 0; line-height: 30px;">If you do not guess the word in the given number of attempts, you will lose.<br></p>
        </div>
        <p class="text-center text-main row-word" style="font-size: 23px; width: 40%; margin: 20px auto;">But do not worry, because with each new word your skills improve!</p>
    </div>
@endsection
