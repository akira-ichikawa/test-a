<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ExampleConversation extends Conversation
{
   /**
    * First question
    */
   public function askLanguage()
   {
       $this->ask('Hello! Please English.', function(Answer $answer) {
           // Save result

           $this->language = $answer->getText();
           
           $str = mb_convert_kana($this->language, "S");
           
    
     $url = 'https://api.cognitive.microsoft.com/sts/v1.0/issueToken';
  //   $dotenv = new Dotenv\Dotenv(__DIR__);
//     $dotenv->load();
  //   $api_key = getenv('API_KEY');
     $header = array(
           "Content-Type: application/x-www-form-urlencoed", //ファイルの種類
           "Accept: application/jwt",
           "Content-Length: 0",
           'Ocp-Apim-Subscription-Key: put ENV["API_KEY"]'
//           'Ocp-Apim-Subscription-Key: '//Microsoft Translator Text APIキー
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
       $this->language = file_get_contents($url.$data);
       $this->language = preg_replace('/<("[^"]*"|\'[^\']*\'|[^\'">])*>/','',$this->language);//タグの除去を正規表現により行う
   
       
       
    //   $this->say($answer->getText);
           $this->say($this->language);

       });
   }

   public function run()
   {
       // This will be called immediately
       $this->askLanguage();
   }
}