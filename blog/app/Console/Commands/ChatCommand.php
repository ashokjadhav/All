<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ChatCommand extends Command 
{
    protected $name = 'socket:chat';

    protected $description = "chat command";

    public function fire()
    {
        Socket::init($this->argument('action'), array(
            'class' => 'ChatWebsocketDaemonHandler',
            'pid' => '/tmp/websocket_chat.pid',
            'websocket' => 'tcp://127.0.0.1:8000',
            //'localsocket' => 'tcp://127.0.0.1:8010',
            //'master' => 'tcp://127.0.0.1:8020',
            //'eventDriver' => 'event'
        ));
    } // end fire

    protected function getArguments()
    {
        return array(
            array('action', InputArgument::REQUIRED, 'start|stop|restart'),
        );
    } // end getArguments

    protected function getOptions()
    {
        return array();
    } // end getOptions
}