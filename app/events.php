<?php

Event::listen('sendMail.*', function($params) {
    switch (Event::firing()) {

        case'sendMail.clientRegistration':
            $clientObj = Model\Client::find($params->client_id);
            $data = new stdClass();
            $data->entity = $clientObj;

            Email\Sender::send('emails.notifications.clientRegistration', array('data' => $data));
            break;

        case'sendMail.contractorRegistration':
            $contractorObj = Model\Contractor::find($params->contractor_id);
            $data = new stdClass();
            $data->entity = $contractorObj;

            Email\Sender::send('emails.notifications.contractorRegistration', array('data' => $data));
            break;

        case 'sendMail.clientInterviewRequired':

            break;
    }
});
