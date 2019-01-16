<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
        $botman->hears('/start', function ($bot) {
            $bot->reply('Добрый день, укажите пожалуйста город.');
        });
        /*$botman->hears("([/\w\sа-я]+)", function ($bot) {
            $bot->reply(' укажите пожалуйста город.');
        });*/
        $botman->hears("{city}", function ($bot,$city) {
            $result=$this->getWeather($city);
            $bot->reply($result);
        });

        $botman->listen();
    }
    public function getWeather($city)
    {
        

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
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
}
