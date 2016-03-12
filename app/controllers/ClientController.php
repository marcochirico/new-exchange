<?php

class ClientController extends BaseController {

    protected $layout = 'master';

    public function login() {
        $data = new stdClass();
        $this->layout->content = View::make('client.login')->with('data', $data);
    }

    public function register() {
        $data = new stdClass();

        //industry types
        $data->countries = Utils\Helper::aggregateForSelect(Model\Country::where('status', 1)->get(), 'country_id', 'country');
        $data->industryTypes = Utils\Helper::aggregateForSelect(Model\IndustryType::where('status', 1)->get(), 'industry_id', 'name');

        $this->layout->content = View::make('client.register')->with('data', $data);
    }

    public function registrationConfirm() {
        $data = new stdClass();

        $this->layout->content = View::make('client.registrationConfirm')->with('data', $data);
    }

    public function edit() {
        $data = new stdClass();
        $data->select = 'edit';
        $data->interviewStatus = Model\Client::interviewStatus();
        $data->projectStatus = Model\Client::projectStatus();
        $data->interviews = Model\Client::getInterviewRequired();
        $data->countries = Utils\Helper::aggregateForSelect(Model\Country::where('status', 1)->get(), 'country_id', 'country');
        $data->industryTypes = Utils\Helper::aggregateForSelect(Model\IndustryType::where('status', 1)->get(), 'industry_id', 'name');

        $clientId = \Session::get('client_id');
        $data->details = Model\Client::find($clientId);
//        echo '<pre>';
//        print_r($data->details);die;
        $this->layout->content = View::make('client.edit')->with('data', $data);
    }

    public function save() {
        $input = Input::all();

        if (isset($input['client_id'])) {
            $clientObj = Model\Client::find($input['client_id']);
        } else {
            $clientObj = Model\Client::make();
        }
        if ($clientObj->validate($input)) {

//            $password = Security\Helper::generatePassword($input['first_name'], $input['last_name']);

            $clientObj->company_name = $input['company_name'];
            $clientObj->first_name = $input['first_name'];
            $clientObj->last_name = $input['last_name'];
            $clientObj->industry_id = $input['industry_id'];
            $clientObj->email = $input['email'];
            $clientObj->phone = $input['phone'];
            $clientObj->mobile = $input['mobile'];
            $clientObj->fax = $input['fax'];
            $clientObj->address = $input['address'];
            $clientObj->country_id = $input['country_id'];
            $clientObj->city = $input['city'];
            $clientObj->postal_code = $input['postal_code'];
            $clientObj->province = $input['province'];
//            $clientObj->requirement_id = $input['requirement_id'];
            $clientObj->terms = $input['terms'] == 'on' ? true : false;
            $clientObj->status = true;
            $clientObj->username = $input['email']; //Security\Helper::generateUsername($input['first_name'], $input['last_name']);
            $clientObj->password = sha1($input['password']);
            $clientObj->reminder_token = Security\Helper::generateReminderToken($clientObj->username);
            $clientObj->save();

            //Send confirmation email
            $data = new stdClass();
            $data->client_id = $clientObj->client_id;
            Event::fire('sendMail.clientRegistration', array($data));
            
            //redirect to confirmation page
            return Redirect::to('client/registration/confirm');
        } else {
            $failed = $clientObj->errors->messages(); //->all();
            if (isset($input['client_id'])) {
                Session::flash('client_update_errors', $failed);
                return Redirect::to('client/edit')->withInput(Input::except('password'));
            } else {
                Session::flash('client_register_errors', $failed);
                return Redirect::to('client/register')->withInput(Input::except('password'));
            }
        }
    }

    public function update() {
        $input = Input::all();

        if (isset($input['client_id'])) {
            $clientObj = Model\Client::find($input['client_id']);

            if ($clientObj->validate($input)) {

                $clientObj->company_name = $input['company_name'];
                $clientObj->first_name = $input['first_name'];
                $clientObj->last_name = $input['last_name'];
                $clientObj->industry_id = $input['industry_id'];
                $clientObj->phone = $input['phone'];
                $clientObj->mobile = $input['mobile'];
                $clientObj->fax = $input['fax'];
                $clientObj->address = $input['address'];
                $clientObj->country_id = $input['country_id'];
                $clientObj->city = $input['city'];
                $clientObj->postal_code = $input['postal_code'];
                $clientObj->province = $input['province'];
                $clientObj->save();

                Session::flash('client_update_confirm', true);
                return Redirect::to('client/edit');
            } else {
                $failed = $clientObj->errors->messages(); //->all();
                Session::flash('client_update_errors', $failed);
                return Redirect::to('client/edit')->withInput(Input::except('password'));
            }
        }
    }

    public function dashboard() {
        $data = new stdClass();
        $data->select = 'dashboard';
        $data->interviewStatus = Model\Client::interviewStatus();
        $data->projectStatus = Model\Client::projectStatus();

        $this->layout->content = View::make('client.dashboard')->with('data', $data);
    }

    public function loginAuthorize() {
        $input = Input::all();

        //parse input
        $username = $input['username'];
        $password = $input['password'];

        $clientObj = Model\Client::where('username', $username)
                ->where('password', sha1($password))
                ->first();

        if (isset($clientObj->client_id)) {
            Session::set('client_id', $clientObj->client_id);
            return Redirect::to('client/dashboard');
        } else {
            Session::flash('client_credential', '1');
            return Redirect::to('client/login');
        }

        return Redirect::to('client/login');
    }

    public function logout() {
        Session::forget('client_id');
        return Redirect::to('client/login');
    }

    public function searchContractors() {
        $data = new stdClass();
        $data->select = 'search';
        $data->interviewStatus = Model\Client::interviewStatus();
        $data->projectStatus = Model\Client::projectStatus();


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

        $input = Input::all();
        $arrParams = array(
            'first_name' => isset($input['first_name']) ? $input['first_name'] : '',
            'last_name' => isset($input['last_name']) ? $input['last_name'] : '',
            'citizenship_country_id' => isset($input['citizenship_country_id']) ? $input['citizenship_country_id'] : '',
            'residence_country_id' => isset($input['residence_country_id']) ? $input['residence_country_id'] : '',
            'city' => isset($input['city']) ? $input['city'] : '',
            'work_situation_id' => isset($input['work_situation_id']) ? $input['work_situation_id'] : '',
            'consulting_market_id' => isset($input['consulting_market_id']) ? $input['consulting_market_id'] : '',
            'consulting_role_id' => isset($input['consulting_role_id']) ? $input['consulting_role_id'] : '',
            'experience_level_id' => isset($input['experience_level_id']) ? $input['experience_level_id'] : '',
            'expertise_area_id' => isset($input['expertise_area_id']) ? $input['expertise_area_id'] : '',
            'module_id' => isset($input['module_id']) ? $input['module_id'] : '',
        );

        if (isset($input['_token'])) {
            $hashTokenSession = md5(time() . rand(0, 100000000));
            Session::set($hashTokenSession, $arrParams);
            return Redirect::to('client/contractors/search/results/' . $hashTokenSession);
        }

        $this->layout->content = View::make('client.searchContractor')->with('data', $data);
    }

    public function searchContractorsResults($hashTokenSession) {
        $data = new stdClass();
        $data->select = 'search';
        $data->interviewStatus = Model\Client::interviewStatus();
        $data->projectStatus = Model\Client::projectStatus();
        $paramsSession = Session::get($hashTokenSession);

        $resultsObj = new Model\Contractor();
        if (is_array($paramsSession) && count($paramsSession) > 0) {
            foreach ($paramsSession as $key => $value) {
                if ($value == '' || $value == '-1') {
                    continue;
                }
                $resultsObj = $resultsObj->where($key, $value);
            }
        }

        $data->searchResults = $resultsObj->paginate(Config::get('pagination.client_search_contractor'));

        $this->layout->content = View::make('client.searchContractorResults')->with('data', $data);
    }

    public function actions($actionType, $index) {
        $data = new stdClass();
        $contractorObj = Model\Contractor::find($index);
        $data->contractor = $contractorObj;
        $this->layout->content = View::make('client.actions.contractorInvitationForm')->with('data', $data);
    }

    public function interviewsRequired() {
        $data = new stdClass();
        $data->select = 'required';
        $data->interviewStatus = Model\Client::interviewStatus();
        $data->projectStatus = Model\Client::projectStatus();
        $data->interviews = Model\Client::getInterviewRequired();
        $this->layout->content = View::make('client.interviewRequired')->with('data', $data);
    }

    public function interviewsReplaced() {
        $data = new stdClass();
        $data->select = 'replaced';
        $data->interviewStatus = Model\Client::interviewStatus();
        $data->projectStatus = Model\Client::projectStatus();
        $data->interviews = Model\Client::getInterviewReplaced();
        $this->layout->content = View::make('client.interviewReplaced')->with('data', $data);
    }

    public function interviewsAccepted() {
        $data = new stdClass();
        $data->select = 'accepted';
        $data->interviewStatus = Model\Client::interviewStatus();
        $data->projectStatus = Model\Client::projectStatus();
        $data->interviews = Model\Client::getInterviewAccepted();
        $this->layout->content = View::make('client.interviewAccepted')->with('data', $data);
    }

    public function interviewsFeedback() {
        $data = new stdClass();
        $data->select = 'feedback';
        $data->interviewStatus = Model\Client::interviewStatus();
        $data->projectStatus = Model\Client::projectStatus();
        $data->interviews = Model\Client::getInterviewFeedback();
        $this->layout->content = View::make('client.interviewFeedback')->with('data', $data);
    }

    public function interviewsRefused() {
        $data = new stdClass();
        $data->select = 'refused';
        $data->interviewStatus = Model\Client::interviewStatus();
        $data->projectStatus = Model\Client::projectStatus();
        $data->interviews = Model\Client::getInterviewRefused();
        $this->layout->content = View::make('client.interviewRefused')->with('data', $data);
    }

    public function projectsActive() {
        $data = new stdClass();
        $data->select = 'active';
        $data->interviewStatus = Model\Client::interviewStatus();
        $data->projectStatus = Model\Client::projectStatus();
        $data->projects = Model\Client::getProjectActive();
        $this->layout->content = View::make('client.projectActive')->with('data', $data);
    }

    public function forgotPassword() {
        $this->layout->content = View::make('client.forgot');
    }

    public function forgotPasswordProcess() {
        $input = Input::all();

        print_r($input);
        die;
    }

}
