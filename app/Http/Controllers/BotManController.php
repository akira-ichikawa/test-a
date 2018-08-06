<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\MotoConversation;
use App\Conversations\HukuseiConversation;
use App\Conversations\E2jConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function motoConversation(BotMan $bot)
    {
        $bot->motomotoConversation(new MotoConversation());
    }
    
    public function hukuseiConversation(BotMan $bot)
    {
        $bot->hukuhukuConversation(new HukuseiConversation());
    }
    
    public function e2jConversation(BotMan $bot)
    {
        $bot->e2jConversation(new E2jConversation());
    }
}
