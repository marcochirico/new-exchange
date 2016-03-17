<?php

namespace Email;

Class Sender {

    public static function send($tpl, $params, $mailTo, $mailSubject) {

        $data = new \stdClass();
        $data->mailTo = $mailTo;
        $data->mailSubject = $mailSubject;

        \Mail::send($tpl, $params, function($message) use ($data) {

            $message->to($data->mailTo);

            $message->subject($data->mailSubject);

//                $message->attach($pathToFile);
        });
    }

}
