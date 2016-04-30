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
            /*
             * client_id
             * contractor_id
             * Send to contractor
             */
            $data = new stdClass();
//            $data->entity = $contractorObj;

            $mailSubject = 'Interview Required';
            $mailTo = $contractorObj->email; //'info@microtech-cr.com';

            Email\Sender::send('emails.notifications.clientInterviewRequired', array('data' => $data), $mailTo, $mailSubject);
            
            break;

        case 'sendMail.clientInterviewFeedback':
            /*
             * interview_id
             * Send to contractor
             */
            $data = new stdClass();
//            $data->entity = $contractorObj;

            $mailSubject = 'Interview Feedback';
            $mailTo = $contractorObj->email; //'info@microtech-cr.com';
            
            //if Positive or negative
            Email\Sender::send('emails.notifications.clientInterviewFeedbackPositive', array('data' => $data), $mailTo, $mailSubject);
            
            break;

        case 'sendMail.contractorInterviewReceivedAccept':
            /*
             * interview_id
             * Send to client
             */
            $data = new stdClass();
//            $data->entity = $contractorObj;

            $mailSubject = 'Interview Accepted';
            $mailTo = $contractorObj->email; //'info@microtech-cr.com';
            
            //if Positive or negative
            Email\Sender::send('emails.notifications.contractorInterviewAccepted', array('data' => $data), $mailTo, $mailSubject);
            
            break;

        case 'sendMail.contractorInterviewReceivedRefuse':
            /*
             * interview_id
             * Send to client
             */
            $data = new stdClass();
//            $data->entity = $contractorObj;

            $mailSubject = 'Interview Refused';
            $mailTo = $contractorObj->email; //'info@microtech-cr.com';
            
            //if Positive or negative
            Email\Sender::send('emails.notifications.contractorInterviewAccepted', array('data' => $data), $mailTo, $mailSubject);
            
            break;

        case 'sendMail.contractorInterviewFeedbackConfirm':
            /*
             * interview_id
             */
            break;

        case 'sendMail.contractorInterviewFeedbackRefuse':
            /*
             * interview_id
             */
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
