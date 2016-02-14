<?php

class ContractorController extends BaseController {

    protected $layout = 'master';

    public function login() {
        $data = new stdClass();
        $this->layout->content = View::make('contractor.login')->with('data', $data);
    }

    public function register() {
        $data = new stdClass();

        $data->countries = Utils\Helper::aggregateForSelect(Model\Country::where('status', 1)->get(), 'country_id', 'country');
        $data->workSituations = Utils\Helper::aggregateForSelect(Model\WorkSituation::where('status', 1)->get(), 'work_situation_id', 'work_situation');
        $data->consultingMarkets = Utils\Helper::aggregateForSelect(Model\ConsultingMarket::where('status', 1)->get(), 'consulting_market_id', 'consulting_market');
        $data->consultingRoles = Utils\Helper::aggregateForSelect(Model\ConsultingRole::where('status', 1)->get(), 'consulting_role_id', 'consulting_role');
        $data->experienceLevels = Utils\Helper::aggregateForSelect(Model\Experience::where('status', 1)->get(), 'experience_level_id', 'experience_level');
        $data->expertiseAreas = Utils\Helper::aggregateForSelect(Model\ExpertiseArea::where('status', 1)->get(), 'expertise_area_id', 'expertise_area');
        $data->modules = Utils\Helper::aggregateForSelect(Model\Module::where('status', 1)->get(), 'module_id', 'module');
        $data->rateTypes = Utils\Helper::aggregateForSelect(Model\RateType::where('status', 1)->get(), 'rate_type_id', 'rate_type');
        $data->currencies = Utils\Helper::aggregateForSelect(Model\Currency::where('status', 1)->get(), 'currency_id', 'currency');
        $data->paymentMethods = Utils\Helper::aggregateForSelect(Model\PaymentMethod::where('status', 1)->get(), 'payment_method_id', 'payment_method');
        $data->paymentTerms = Utils\Helper::aggregateForSelect(Model\PaymentTerm::where('status', 1)->get(), 'payment_term_id', 'payment_term');
        $data->billingCycles = Utils\Helper::aggregateForSelect(Model\BillingCycle::where('status', 1)->get(), 'billing_cycle_id', 'billing_cycle');


//        print_r($data);die;


        $this->layout->content = View::make('contractor.register')->with('data', $data);
    }

    public function registrationConfirm() {
        $data = new stdClass();

        $this->layout->content = View::make('contractor.registrationConfirm')->with('data', $data);
    }

    public function save() {
        $input = Input::all();
//        echo '<pre>';
//        print_r($input);
//        die;
        $contractorObj = Model\Contractor::make();

        if ($contractorObj->validate($input)) {

            //curriculum upload
            $fileName = '';
            if (Input::hasFile('cv_document')) {
                $extension = Input::file('cv_document')->getClientOriginalExtension();
                $fileName = md5('cv' . time() . rand(0, 1000)) . '.' . $extension;
                $destinationPath = Config::get('attachment.documents.paths.cv');
                Input::file('cv_document')->move($destinationPath, $fileName);
            }

            $contractorObj->first_name = $input['first_name'];
            $contractorObj->middle_name = $input['middle_name'];
            $contractorObj->last_name = $input['last_name'];
            $contractorObj->address = $input['address'];
            $contractorObj->citizenship_country_id = $input['citizenship_country_id'];
            $contractorObj->residence_country_id = $input['residence_country_id'];
            $contractorObj->city = $input['city'];
            $contractorObj->province = $input['province'];
            $contractorObj->postal_code = $input['postal_code'];
            $contractorObj->linkedin = $input['linkedin'];
            $contractorObj->email = $input['email'];
            $contractorObj->phone = $input['phone'];
            $contractorObj->mobile = $input['mobile'];
            $contractorObj->fax = $input['fax'];
            $contractorObj->work_situation_id = $input['work_situation_id'];
            $contractorObj->consulting_market_id = $input['consulting_market_id'];
            $contractorObj->consulting_role_id = $input['consulting_role_id'];
            $contractorObj->experience_level_id = $input['experience_level_id'];
            $contractorObj->expertise_area_id = $input['expertise_area_id'];
            $contractorObj->module_id = $input['module_id'];
            $contractorObj->rate_type_id = $input['rate_type_id'];
            $contractorObj->currency_id = $input['currency_id'];
            $contractorObj->rate = $input['rate'];
            $contractorObj->payment_method_id = $input['payment_method_id'];
            $contractorObj->payment_term_id = $input['payment_term_id'];
            $contractorObj->billing_cycle_id = $input['billing_cycle_id'];
            $contractorObj->business_name = $input['business_name'];
            $contractorObj->business_registration_number = $input['business_registration_number'];
            $contractorObj->business_tax_number = $input['business_tax_number'];
            $contractorObj->business_address = $input['business_address'];
            $contractorObj->business_country_id = $input['business_country_id'];
            $contractorObj->business_city = $input['business_city'];
            $contractorObj->business_province = $input['business_province'];
            $contractorObj->business_postal_code = $input['business_postal_code'];
            $contractorObj->cv = $fileName;
            $contractorObj->username = $input['email'];
            $contractorObj->password = sha1($input['password']);
            $contractorObj->status = true;
            $contractorObj->save();

            return Redirect::to('contractor/registration/confirm');
        } else {
            $failed = $contractorObj->errors->messages(); //->all();

            Session::flash('contractor_register_errors', $failed);
            return Redirect::to('contractor/register')->withInput(Input::except('password'));
            ;
        }
    }

    public function dashboard() {
        $data = new stdClass();
        $data->select = 'dashboard';
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->projectStatus = Model\Contractor::projectStatus();
        $data->jobStatus = Model\Contractor::jobStatus();

        $this->layout->content = View::make('contractor.dashboard')->with('data', $data);
    }

    public function loginAuthorize() {
        $input = Input::all();

        //parse input
        $username = $input['username'];
        $password = $input['password'];

        $contractorObj = Model\Contractor::where('username', $username)
                ->where('password', sha1($password))
                ->first();

        if (isset($contractorObj->contractor_id)) {
            Session::set('contractor_id', $contractorObj->contractor_id);
            return Redirect::to('contractor/dashboard');
        } else {
            Session::flash('contractor_credential', '1');
            return Redirect::to('contractor/login');
        }

        return Redirect::to('contractor/login');
    }

    public function logout() {
        Session::forget('contractor_id');
        return Redirect::to('contractor/login');
    }

    public function interviewsReceived() {
        $data = new stdClass();
        $data->select = 'received';
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->projectStatus = Model\Contractor::projectStatus();
        $data->jobStatus = Model\Contractor::jobStatus();
        $data->interviews = Model\Contractor::getInterviewReceived();
        $this->layout->content = View::make('contractor.interviewReceived')->with('data', $data);
    }

    public function interviewsReplaced() {
        $data = new stdClass();
        $data->select = 'replaced';
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->projectStatus = Model\Contractor::projectStatus();
        $data->jobStatus = Model\Contractor::jobStatus();
        $data->interviews = Model\Contractor::getInterviewReplaced();
        $this->layout->content = View::make('contractor.interviewReplaced')->with('data', $data);
    }

    public function interviewsAccepted() {
        $data = new stdClass();
        $data->select = 'accepted';
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->projectStatus = Model\Contractor::projectStatus();
        $data->jobStatus = Model\Contractor::jobStatus();
        $data->interviews = Model\Contractor::getInterviewAccepted();
        $this->layout->content = View::make('contractor.interviewAccepted')->with('data', $data);
    }

    public function interviewsRefused() {
        $data = new stdClass();
        $data->select = 'refused';
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->projectStatus = Model\Contractor::projectStatus();
        $data->jobStatus = Model\Contractor::jobStatus();
        $data->interviews = Model\Contractor::getInterviewRefused();
        $this->layout->content = View::make('contractor.interviewRefused')->with('data', $data);
    }

    public function interviewsFeedback() {
        $data = new stdClass();
        $data->select = 'feedback';
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->projectStatus = Model\Contractor::projectStatus();
        $data->jobStatus = Model\Contractor::jobStatus();
        $data->interviews = Model\Contractor::getInterviewFeedback();
        $this->layout->content = View::make('contractor.interviewFeedback')->with('data', $data);
    }

    public function projectsActive() {
        $data = new stdClass();
        $data->select = 'active';
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->projectStatus = Model\Contractor::projectStatus();
        $data->jobStatus = Model\Contractor::jobStatus();
        $data->projects = Model\Contractor::getProjectActive();
        $this->layout->content = View::make('contractor.projectActive')->with('data', $data);
    }

    public function projectsClosed() {
        $data = new stdClass();
        $data->select = 'closed';
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->projectStatus = Model\Contractor::projectStatus();
        $data->jobStatus = Model\Contractor::jobStatus();
        $data->interviews = Model\Contractor::getProjectClose();
        $this->layout->content = View::make('contractor.projectClosed')->with('data', $data);
    }

    public function jobsApplied() {
        $data = new stdClass();
        $data->select = 'applied';
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->projectStatus = Model\Contractor::projectStatus();
        $data->jobStatus = Model\Contractor::jobStatus();
        $data->interviews = Model\Job::getJobApplied();
        $this->layout->content = View::make('contractor.jobApplied')->with('data', $data);
    }

    public function forgotPassword() {
        $this->layout->content = View::make('contractor.forgot');
    }

    public function forgotPasswordProcess() {
        $input = Input::all();

        $contractorObj = Model\Contractor::where('email', $input['email'])->first();

        $reminderToken = $contractorObj->reminder_token;

        $link = 'http://local.newexchange2016/contractor/forgot-password/recover/' . $reminderToken;
        die($link);
    }
    
    public function forgotPasswordRecover($token) {
        $data = new stdClass();
        $contractorObj = Model\Contractor::where('reminder_token', $token)->first();
        
        $this->layout->content = View::make('contractor.recover')->with('data', $data);

    }

}
