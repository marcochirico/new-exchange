<?php

namespace Email;

Class Sender {

    public static function send($tpl, $params) {
        \Mail::send($tpl, $params, function($message) {
            
            $message->to('mario@rossi.net');

            $message->subject('New exchange test mail');

//                $message->attach($pathToFile);
        });
    }

}
