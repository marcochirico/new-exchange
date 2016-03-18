<?php

class AjaxController extends BaseController {

    public static function interviewRequest() {
        $input = Input::all();

        $data = new stdClass();
        $data->contractor_id = $input['actionId'];
        $data->client_id = Session::get('client_id');
        $data->timezones = Model\Timezone::all();
        $data->interview = null;

        return View::make('client.modals.sendInvitation')->with('data', $data);
    }

    public static function saveInterviewRequest() {
        $input = Input::all();
        $status = 10;

        //reset destination of replaced entity
        if ($input['interview_id'] != '') {
            $objInterview = Model\Interview::find($input['interview_id']);
            $interviewId = $objInterview->parent_interview_id > 0 ? $objInterview->parent_interview_id : $objInterview->interview_id;

            switch (Security\Helper::getLoggedType()) {
                case 'contractor':
                    $status = 12;   //waiting from client
                    break;
                case 'client':
                    $status = 14;   //waiting from contractor
                    break;
            }
        }

        try {
            $objInterview = Model\Interview::make();

            if ($objInterview->validate($input)) {

                $objInterview->client_id = $input['client_id'];
                $objInterview->contractor_id = $input['contractor_id'];
                $objInterview->timezone_id = $input['interview_request']['timezone_id'];
                $objInterview->date = Utils\Helper::dateToDb($input['interview_request']['proposed_date']) . ' ' . $input['interview_request']['proposed_time'] . ':00';
                $objInterview->location = $input['interview_request']['proposed_location'];
                $objInterview->rate = $input['interview_request']['proposed_rate'];
                $objInterview->reference = $input['interview_request']['job_reference'];
                $objInterview->preview = $input['interview_request']['job_preview'];
                $objInterview->status = $status;
                //replace
                if ($input['interview_id'] != '') {
                    $objInterview->parent_interview_id = $interviewId;
                }
                $objInterview->save();
                return Response\Helper::ajaxDone('Invitation Sent.');
            } else {
                $failed = $objInterview->errors->messages()->all();
                return Response\Helper::ajaxErrorListed($failed);
            }
        } catch (Exception $e) {
            return Response\Helper::ajaxError($e->getMessage());
        }
    }

    public static function interviewRevoke() {
        $input = Input::all();

        $updated = Model\Interview::find($input['interview_id']);
        $updated->status = 0;
        $updated->save();

        if ($updated) {
            return Response\Helper::ajaxDone('Invitation Revoke.');
        }
        return Response\Helper::ajaxError('Something wrong.');
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

            //update interview
            $objInterview = Model\Interview::find($input['interview_id']);
            $objInterview->status = 30;
            $objInterview->feedback = $input['interview_feedback']['feedback_outcome'];
            $objInterview->feedback_description = $input['interview_feedback']['feedback_description'];
            if ($objInterview->feedback == 1) {
                $objInterview->project_start_date = Utils\Helper::dateToDb($input['interview_feedback']['project_start_date']);
                $objInterview->project_duration = $input['interview_feedback']['project_duration'];
                $objInterview->project_rate = $input['interview_feedback']['project_rate'];
                $objInterview->project_payment_method_id = $input['interview_feedback']['project_billing_method'];
                $objInterview->project_billing_cycle_id = $input['interview_feedback']['project_billing_cycle'];
            }
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

        $interviewObj = Model\Interview::find($input['actionId']);

        $data = new stdClass();
        $data->contractor_id = $interviewObj->contractor_id;
        $data->client_id = $interviewObj->client_id;
        $data->interview = $interviewObj;
        $data->timezones = Model\Timezone::all();

        return View::make('client.modals.sendInvitation')->with('data', $data);
    }

    public function clientInterviewReceivedReplace() {
        $input = Input::all();

        $interviewObj = Model\Interview::find($input['actionId']);

        $data = new stdClass();
        $data->contractor_id = $interviewObj->contractor_id;
        $data->client_id = $interviewObj->client_id;
        $data->interview = $interviewObj;
        $data->timezones = Model\Timezone::all();

        return View::make('client.modals.sendInvitation')->with('data', $data);
    }

    public function contractorInterviewReceivedRefuse() {
        $input = Input::all();
        try {
            $objInterview = Model\Interview::find($input['actionId']);
            $objInterview->status = 0; //refuse
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
            $objProject->contractor_id = $objInterview->contractor_id;
            $objProject->client_id = $objInterview->client_id;
            $objProject->date_start = $objInterview->project_start_date;
            $objProject->billing_cycle_id = $objInterview->project_billing_cycle_id;
            $objProject->payment_method_id = $objInterview->project_payment_method_id;
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
        $data->projectTimesheet = Model\ProjectTimesheet::where('project_id', $input['actionId'])->get();
        $data->projectId = $input['actionId'];
        return View::make('contractor.modals.projectFillTimesheet')->with('data', $data);
    }

    public function contractorProjectTimesheetSave() {

        $input = Input::all();

        if (isset($input['timesheet']['date'])) {
            try {
                Model\ProjectTimesheet::where('project_id', $input['project_id'])->delete();
                foreach ($input['timesheet']['date'] as $index => $date) {
                    if ($date != '') {
                        $prjTs = Model\ProjectTimesheet::make();
                        $prjTs->project_id = $input['project_id'];
                        $prjTs->date = Utils\Helper::dateToDb($date);
                        if (isset($input['timesheet']['hours'][$index])) {
                            $prjTs->hours = $input['timesheet']['hours'][$index];
                        }
                        $prjTs->save();
                    }
                }
                return Response\Helper::ajaxDone('Timeshhet filled correctly.');
            } catch (Exception $e) {
                return Response\Helper::ajaxError($e->getMessage());
            }
        }
    }

}
