<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

//$botman->hears('Hi', function ($bot) {
//    $bot->reply('Hello!');
//});  

$botman->hears('Hi', function ($bot) {
   $reply2 = getenv('HENJI');
    $bot->reply($reply2
        );
});  
    
    $botman->hears('Hello', function ($bot) {
    $bot->reply('Hi!');
});

//-------

      
       $botman->hears('{msg}', function ($bot, $msg) {
        
            $str = mb_convert_kana($msg, "S");

// ここに文字カウント→言語認識の前後で何か影響あるかな？           
// ここに言語認識API
    
     $url = 'https://api.cognitive.microsoft.com/sts/v1.0/issueToken';
     $key = getenv('API_KEY');
     $header = array(
           "Content-Type: application/x-www-form-urlencoed", //ファイルの種類
           "Accept: application/jwt",
           "Content-Length: 0",
//         'Ocp-Apim-Subscription-Key: de18ea8a152146e49716628216fbf67d'
           "Ocp-Apim-Subscription-Key: $key"
         
//         put ENV["API_KEY"]'
           ); //キー隠す
     $context = array(
           "http" => array(
           "method" => "POST",
           "header" => implode("\r\n", $header)
        ));
     $token = file_get_contents($url, false, stream_context_create($context));//アクセストークンを取得
       
       $key = "Bearer%20". $token;
       $text = $str;
       $url = "https://api.microsofttranslator.com/v2/http.svc/Translate";
       $data = "?appid=".$key."&text=".$text."&to=ja";
       $str = file_get_contents($url.$data);
       $str = preg_replace('/<("[^"]*"|\'[^\']*\'|[^\'">])*>/','',$str);//タグの除去を正規表現により行う
   
         $bot->reply($str);
});



//-------



$botman->hears('help', BotManController::class.'@motoConversation');

//$botman->hears('he', BotManController::class.'@hukuseiConversation');

//$botman->hears('tr', BotManController::class.'@e2jConversation');

//ぉれつかうやつ $botman->hears('', BotManController::class.'@startConversation');


/*
$botman->hears('Hello BotMan!', function($bot) {
    $bot->reply('Hello!');
    $bot->ask('Whats your name?', function($answer, $bot) {
        $bot->say('Welcome '.$answer->getText());
    });
});
*/

//$botman->listen();　　←なんかこれ消したら返事くれるようになった。。。