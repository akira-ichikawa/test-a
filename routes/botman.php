<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});  
    
    $botman->hears('Hello', function ($bot) {
    $bot->reply('Hi!');
});

$botman->hears('help', BotManController::class.'@motoConversation');

$botman->hears('he', BotManController::class.'@hukuseiConversation');

$botman->hears('tr', BotManController::class.'@e2jConversation');


/*
$botman->hears('Hello BotMan!', function($bot) {
    $bot->reply('Hello!');
    $bot->ask('Whats your name?', function($answer, $bot) {
        $bot->say('Welcome '.$answer->getText());
    });
});
*/

//$botman->listen();　　←なんかこれ消したら返事くれるようになった。。。