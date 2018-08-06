<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class HukuseiConversation extends Conversation
{
    /**
     * First question
     */
    public function hukuReason()
    
    {
        $question = Question::create("どした")
            ->fallback('Unable to ask question')  // 
            ->callbackId('ask_reason')  //
            ->addButtons([
                Button::create('英語で冗談を言って')->value('joke'),
                Button::create('英語で名言を言って')->value('quote'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'joke') {
                    $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    $this->say($joke->value->joke);
                } else {
                    $this->say(Inspiring::quote());
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->hukuReason();
    }
}
