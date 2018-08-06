<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class E2jConversation extends Conversation


//{
    /**
     * First question
      */
   public function e2j() {
//      $this->reply('Hello');
//        $japanese = "";
//        $english = "";
        $this->ask('Input English', function($answer, $bot) {
        $bot->say('here you are'.$answer->getText());
        }); 
};

/*
        $botman->hears('tr', function($bot) {
    $bot->reply('Hello!');
    $bot->ask('Whats your name?', function($answer, $bot) {
        $bot->say('Welcome '.$answer->getText());
    });
});
}
*/

//}
//}
        
/*        
        {
            if(isset($_POST["english"]))
            {
                $english = $_POST["english"];
                $url = 'https://api.cognitive.microsoft.com/sts/v1.0/issueToken';
                $header = array(
                        "Content-Type: application/x-www-form-urlencoded",
                        "Accept: application/jwt",
                        "Content-Length: 0",
                        'Ocp-Apim-Subscription-Key: de18ea8a152146e49716628216fbf67d'//Microsoft AzureのTranslator Text APIにて取得したキーを入力してください。Microsoftに月額を払わずに運営したい場合、月に最大200万文字だけ翻訳することができます。（2017年7月時点）
                        );
             
                $context = array(
                    "http" => array(
                    "method" => "POST",
                    "header" => implode("\r\n", $header)
                   ));
             
                $token = file_get_contents($url, false, stream_context_create($context));//アクセストークンを取得します。１０分間のみ有効です。
             //file_get_tokenがURL
                $key = "Bearer%20". $token;
                $text = $_POST["english"];
                $url = "https://api.microsofttranslator.com/v2/http.svc/Translate";
                $data = "?appid=".$key."&text=".$text."&to=ja";
                $japanese = file_get_contents($url.$data);//翻訳を実行します。   //
                $japanese = preg_replace('/<("[^"]*"|\'[^\']*\'|[^\'">])*>/','',$japanese);//タグの除去を正規表現により行います。
            };
        
        $this->say($japanese);
    });
    }
*/    
    

/*
<form action="" method="post">
            <p>英語を入力してください。</p>
            <textarea name="english" rows="5" cols="50"><?php echo $english; ?></textarea>
            <p>翻訳結果</p>
            <textarea rows="5" cols="50"><?php echo $japanese; ?></textarea>
            <input type="submit" value="翻訳">
        </form>
*/
        

    /**
     * Start the conversation
     */
/*     
    public function run()
    {
        $this->e2j();
    }
}
*/

?>