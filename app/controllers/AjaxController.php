<?php

class AjaxController extends BaseController {

    public static function interviewRequest() {
        $input = Input::all();

        $data = new stdClass();
        $data->contractor_id = $input['actionId'];
        $data->client_id = Session::get('client_id');
        $data->timezones = Model\Timezone::all();
        
        return View::make('client.modals.sendInvitation')->with('data', $data);
    }

    public static function saveInterviewRequest() {
        $input = Input::all();

        try {
            $objInterview = Model\Interview::make();
            $objInterview->client_id = $input['client_id'];
            $objInterview->contractor_id = $input['contractor_id'];
            $objInterview->timezone_id = $input['interview_request']['timezone_id'];
            $objInterview->date = Utils\Helper::dateToDb($input['interview_request']['proposed_date']) . ' ' . $input['interview_request']['proposed_time'] . ':00';
            $objInterview->location = $input['interview_request']['proposed_location'];
            $objInterview->rate = $input['interview_request']['proposed_rate'];
            $objInterview->reference = $input['interview_request']['job_reference'];
            $objInterview->preview = $input['interview_request']['job_preview'];
            $objInterview->status = 1;
            $objInterview->save();
            return Response\Helper::ajaxDone('Invitation Sent.');
        } catch (Exception $e) {
            return Response\Helper::ajaxError($e->getMessage());
        }
    }

}
