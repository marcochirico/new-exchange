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

    public static function interviewFeedback() {
        $input = Input::all();

        $data = new stdClass();
        $data->interview_id = $input['actionId'];

        return View::make('client.modals.sendInterviewFeedback')->with('data', $data);
    }

    public static function saveInterviewFeedback() {
        $input = Input::all();
        try {

            //create feedback interview
            $objFeedback = Model\InterviewFeedback::make();
            $objFeedback->interview_id = $input['interview_id'];
            $objFeedback->feedback = $input['interview_feedback']['feedback_description'];
            $objFeedback->status = $input['interview_feedback']['feedback_outcome'];
            $objFeedback->save();

            //update interview
            $objInterview = Model\Interview::find($input['interview_id']);
            $objInterview->status = 3;
            $objInterview->save();

            //create new project
            $objProject = Model\Project::make();
            $objProject->interview_id = $input['interview_id'];
            $objProject->days = 20;
            $objProject->rate = 175;
            $objProject->status = true;
            $objProject->save();

            return Response\Helper::ajaxDone('Feedback Sent.');
        } catch (Exception $e) {
            return Response\Helper::ajaxError($e->getMessage());
        }
    }

    /*
     * Contractors Ajax Resposes
     */

    public function contractorInterviewReceivedAccept() {
        $input = Input::all();
        try {
            $objInterview = Model\Interview::find($input['actionId']);
            $objInterview->status = 2; //accepted
            $objInterview->save();
            return Response\Helper::ajaxDone('Invitation Sent.');
        } catch (Exception $e) {
            return Response\Helper::ajaxError($e->getMessage());
        }
    }

    public function contractorInterviewReceivedReplace() {
        $input = Input::all();
        try {
//            $objInterview = Model\Interview::find($input['actionId']);
//            $objInterview->status = 1; //accepted
//            $objInterview->save();
            return Response\Helper::ajaxDone('Invitation Sent.');
        } catch (Exception $e) {
            return Response\Helper::ajaxError($e->getMessage());
        }
    }

    public function contractorInterviewReceivedRefuse() {
        $input = Input::all();
        try {
            $objInterview = Model\Interview::find($input['actionId']);
            $objInterview->status = 0; //accepted
            $objInterview->save();
            return Response\Helper::ajaxDone('Invitation Sent.');
        } catch (Exception $e) {
            return Response\Helper::ajaxError($e->getMessage());
        }
    }

}
