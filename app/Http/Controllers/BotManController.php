<?php

namespace App\Http\Controllers;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use App\Models\Botchat;
use Illuminate\Http\Request;
use App\Botman\OnboardingConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */

    public function handle()
    {
        $botman = app('botman');

        $botman->hears('', function($bot) {
            $bot->startConversation(new OnboardingConversation);
        });

        $botman->listen();


    }

    /**
     * Place your BotMan logic here.
     */


}
