<?php

Event::listen('sendMail.*', function($params) {
    switch (Event::firing()) {

        /*
         * Client Registration
         */
        case'sendMail.clientRegistration':

            $clientObj = Model\Client::find($params->client_id);
            $data = new stdClass();
            $data->entity = $clientObj;

            $mailSubject = 'Client Registration';
            $mailTo = $clientObj->email; //'info@microtech-cr.com';

            Email\Sender::send('emails.notifications.clientRegistration', array('data' => $data), $mailTo, $mailSubject);
            break;

        /*
         * Contractor Registration
         */
        case'sendMail.contractorRegistration':
            $contractorObj = Model\Contractor::find($params->contractor_id);
            $data = new stdClass();
            $data->entity = $contractorObj;

            $mailSubject = 'Contractor Registration';
            $mailTo = $contractorObj->email; //'info@microtech-cr.com';

            Email\Sender::send('emails.notifications.contractorRegistration', array('data' => $data), $mailTo, $mailSubject);
            break;

        /*
         * Client Update Profile
         */
        case'sendMail.clientProfileUpdate':
            $contractorObj = Model\Contractor::find($params->contractor_id);
            $data = new stdClass();
            $data->entity = $contractorObj;

            $mailSubject = 'Client Profile Update';
            $mailTo = $contractorObj->email; //'info@microtech-cr.com';

            Email\Sender::send('emails.notifications.updateProfile', array('data' => $data), $mailTo, $mailSubject);
            break;

        /*
         * Contractor Update Profile
         */
        case'sendMail.contractorProfileUpdate':
            $clientObj = Model\Client::find($params->client_id);
            $data = new stdClass();
            $data->entity = $clientObj;

            $mailSubject = 'Contractor Profile Update';
            $mailTo = $clientObj->email; //'info@microtech-cr.com';

            Email\Sender::send('emails.notifications.updateProfile', array('data' => $data), $mailTo, $mailSubject);
            break;

        /*
         * Client Interview Required
         */
        case 'sendMail.clientInterviewRequired':
            /*
             * client_id
             * contractor_id
             * Send to contractor
             */
            $contractorObj = Model\Contractor::find($params->contractor_id);
            $clientObj = Model\Client::find($params->client_id);
            $interviewObj = Model\Interview::find($params->interview_id);

            $data = new stdClass();
            $data->entity['contractor'] = $contractorObj;
            $data->entity['client'] = $contractorObj;
            $data->entity['interview'] = $interviewObj;

            $mailSubject = 'Interview Required';
            $mailTo = $contractorObj->email;

            Email\Sender::send('emails.notifications.clientInterviewRequired', array('data' => $data), $mailTo, $mailSubject);

            break;

        /*
         * Client Interview Feedback Positive
         */
        case 'sendMail.clientInterviewFeedbackPositive':

            $contractorObj = Model\Interview::find($params->interview_id)->contractor;
            $clientObj = Model\Interview::find($params->interview_id)->client;
            $interviewObj = Model\Interview::find($params->interview_id);

            $data = new stdClass();
            $data->entity['contractor'] = $contractorObj;
            $data->entity['client'] = $clientObj;
            $data->entity['interview'] = $interviewObj;

            $mailSubject = 'Feedback positive';
            $mailTo = $contractorObj->email; //'info@microtech-cr.com';
            Email\Sender::send('emails.notifications.clientInterviewFeedbackPositive', array('data' => $data), $mailTo, $mailSubject);

            break;

        /*
         * Client Interview Feedback Negative
         */
        case 'sendMail.clientInterviewFeedbackNegative':

            $contractorObj = Model\Interview::find($params->interview_id)->contractor;
            $clientObj = Model\Interview::find($params->interview_id)->client;
            $interviewObj = Model\Interview::find($params->interview_id);

            $data = new stdClass();
            $data->entity['contractor'] = $contractorObj;
            $data->entity['client'] = $clientObj;
            $data->entity['interview'] = $interviewObj;

            $mailSubject = 'Feedback negative';
            $mailTo = $contractorObj->email; //'info@microtech-cr.com';
            Email\Sender::send('emails.notifications.clientInterviewFeedbackNegative', array('data' => $data), $mailTo, $mailSubject);

            break;

        case 'sendMail.contractorInterviewReceivedAccept':

            $contractorObj = Model\Interview::find($params->interview_id)->contractor;
            $clientObj = Model\Interview::find($params->interview_id)->client;
            $interviewObj = Model\Interview::find($params->interview_id);

            $data = new stdClass();
            $data->entity['contractor'] = $contractorObj;
            $data->entity['client'] = $clientObj;
            $data->entity['interview'] = $interviewObj;

            $mailSubject = 'Interview Accepted';
            $mailTo = $clientObj->email;

            //if Positive or negative
            Email\Sender::send('emails.notifications.contractorInterviewAccepted', array('data' => $data), $mailTo, $mailSubject);

            break;

        case 'sendMail.contractorInterviewReceivedRefuse':

            $contractorObj = Model\Interview::find($params->interview_id)->contractor;
            $clientObj = Model\Interview::find($params->interview_id)->client;
            $interviewObj = Model\Interview::find($params->interview_id);

            $data = new stdClass();
            $data->entity['contractor'] = $contractorObj;
            $data->entity['client'] = $clientObj;
            $data->entity['interview'] = $interviewObj;

            $mailSubject = 'Interview Refused';
            $mailTo = $clientObj->email;

            //if Positive or negative
            Email\Sender::send('emails.notifications.contractorInterviewRefused', array('data' => $data), $mailTo, $mailSubject);
            
            break;

        case 'sendMail.contractorInterviewReceivedReplaced':
            
            $contractorObj = Model\Interview::find($params->interview_id)->contractor;
            $clientObj = Model\Interview::find($params->interview_id)->client;
            $interviewObj = Model\Interview::find($params->interview_id);

            $data = new stdClass();
            $data->entity['contractor'] = $contractorObj;
            $data->entity['client'] = $clientObj;
            $data->entity['interview'] = $interviewObj;

            $mailSubject = 'Interview Replaced';
            $mailTo = $clientObj->email;

            //if Positive or negative
            Email\Sender::send('emails.notifications.contractorInterviewReplaced', array('data' => $data), $mailTo, $mailSubject);
            
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
