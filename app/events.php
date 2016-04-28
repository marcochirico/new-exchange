<?php

Event::listen('sendMail.*', function($params) {
    switch (Event::firing()) {

        case'sendMail.clientRegistration':

            $clientObj = Model\Client::find($params->client_id);
            $data = new stdClass();
            $data->entity = $clientObj;

            $mailSubject = 'Client Registration';
            $mailTo = $clientObj->email; //'info@microtech-cr.com';

            Email\Sender::send('emails.notifications.clientRegistration', array('data' => $data), $mailTo, $mailSubject);
            break;

        case'sendMail.contractorRegistration':
            $contractorObj = Model\Contractor::find($params->contractor_id);
            $data = new stdClass();
            $data->entity = $contractorObj;

            $mailSubject = 'Contractor Registration';
            $mailTo = $contractorObj->email; //'info@microtech-cr.com';

            Email\Sender::send('emails.notifications.contractorRegistration', array('data' => $data), $mailTo, $mailSubject);
            break;

        case 'sendMail.clientInterviewRequired':

            break;





        case'sendMail.contactUs':
            $data = new stdClass();
            $data->entity = $params->message;

            $mailSubject = 'Contact Us via website';
            $mailTo = 'info@microtech-cr.com';

            Email\Sender::send('emails.contactUs', array('data' => $data), $mailTo, $mailSubject);
            break;
        
        case'sendMail.genericNotification':
            
            $data = new stdClass();

            $mailSubject = 'Notification from New Exchange';
            $mailTo = $params->email;

            Email\Sender::send('emails.genericNotification', array('data' => $data), $mailTo, $mailSubject);
            break;
    }
});
