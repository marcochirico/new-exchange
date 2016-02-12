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
            $objInterview->status = 10;
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
        
        $data->paymentMethods = Utils\Helper::aggregateForSelect(Model\PaymentMethod::where('status', 1)->get(), 'payment_method_id', 'payment_method');
        $data->billingCycles = Utils\Helper::aggregateForSelect(Model\BillingCycle::where('status', 1)->get(), 'billing_cycle_id', 'billing_cycle');


        return View::make('client.modals.sendInterviewFeedback')->with('data', $data);
    }

    public static function saveInterviewFeedback() {
        $input = Input::all();
        try {
            /*
             * Array
(
    [_token] => 3AJNsAd2Wb4nqTolWMCIaRjxI50i0VzzMd279vqA
    [interview_id] => 1
    [interview_feedback] => Array
        (
            [feedback_outcome] => 1
            [project_start_date] => 20/02/2016
            [project_duration] => 30
            [project_rate] => 250
            [project_billing_method] => 1
            [feedback_description] => Feedback positive - You are able to work!
        )

    [interview_feedback_project_billing_cycle] => 3
)
             */

            //update interview
            $objInterview = Model\Interview::find($input['interview_id']);
            $objInterview->status = 30;
            $objInterview->feedback = $input['interview_feedback']['feedback_outcome'];
            $objInterview->feedback_description = $input['interview_feedback']['feedback_description'];
            $objInterview->project_start_date = Utils\Helper::dateToDb($input['interview_feedback']['project_start_date']);
            $objInterview->project_duration = $input['interview_feedback']['project_duration'];
            $objInterview->project_rate = $input['interview_feedback']['project_rate'];
            $objInterview->project_payment_method_id = $input['interview_feedback']['project_billing_method'];
            $objInterview->project_billing_cycle_id = $input['interview_feedback']['project_billing_cycle'];
            $objInterview->save();
            
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
            $objInterview->status = 20; //accepted
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
    
    public function contractorInterviewFeedbackConfirm() {
        $input = Input::all();
        try {
            $objInterview = Model\Interview::find($input['actionId']);
            $objInterview->status = 40;
            $objInterview->save();
            
            //create new project
            $objProject = Model\Project::make();
            $objProject->interview_id = $objInterview->interview_id;
            $objProject->days = $objInterview->project_duration;
            $objProject->rate = $objInterview->project_rate;
            $objProject->status = true;
            $objProject->save();
            
            return Response\Helper::ajaxDone('Project Created.');
        } catch (Exception $e) {
            return Response\Helper::ajaxError($e->getMessage());
        }
    }
    
    public function contractorInterviewFeedbackRefuse() {
        $input = Input::all();
        try {
            $objInterview = Model\Interview::find($input['actionId']);
            $objInterview->status = 50;
            $objInterview->save();
            
            return Response\Helper::ajaxDone('Project Not Created.');
        } catch (Exception $e) {
            return Response\Helper::ajaxError($e->getMessage());
        }
    }
    
    public function contractorProjectTimesheet() {
        
        $input = Input::all();

        $data = new stdClass();
        $data->project_id = $input['actionId'];
        
        return View::make('contractor.modals.projectFillTimesheet')->with('data', $data);
        
    }
    
    

}
