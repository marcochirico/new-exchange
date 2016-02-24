<?php

Event::listen('sendMail.*', function($params) {
    switch (Event::firing()) {
        case 'sendMail.clientInterviewRequired':
            
            Mail::send('emails.notifications.clientInterviewRequired', $params, function($message) {
                $message->from('us@example.com', 'Laravel');
                
                $message->to('info@microtech-cr.com')->cc('marco@mutado.com');
                
                $message->subject('New exchange test mail');
                
//                $message->attach($pathToFile);
            });
            break;
    }
});
