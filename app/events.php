<?php

Event::listen('sendMail.*', function($params) {
    switch (Event::firing()) {
        case 'sendMail.interviewRequest':
            Mail::send('emails.notifications.interviewRequired', $params, function($message) {
                $message->from('us@example.com', 'Laravel');
                
                $message->to('info@microtech-cr.com')->cc('marco@mutado.com');

//                $message->attach($pathToFile);
            });
            break;
    }
});
