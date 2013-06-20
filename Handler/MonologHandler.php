<?php

namespace Evercode\HipchatBundle\Handler;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class MonologHandler extends AbstractProcessingHandler
{
    protected $hipchat;
    protected $room;
    protected $name;

    protected function write(array $record)
    {
        if ($record['level'] < Logger::ERROR) {
            return false;
        }
        $msg = '';
        if(isset($_SERVER['HTTP_HOST']) && isset($_SERVER['REQUEST_URI'])) {
            $url = 'Request url: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $msg .= $url."<br>";
        }
        if($_REQUEST) {
            $msg .= "Request data: ".json_encode($_REQUEST)."<br>";
        }
        if (isset($record['message'])) {
            $msg .= $record['message'];
            $this->hipchat->message_room($this->room, $this->name, $msg, true);
        }
    }

    public function setHipchat($hipchat)
    {
        $this->hipchat = $hipchat;
    }

    public function setHipchatParameters($room, $name)
    {
        $this->room = $room;
        $this->name = $name;
    }
}
