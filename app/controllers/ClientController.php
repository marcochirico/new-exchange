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
        $industryTypes = Model\IndustryType::where('status', 1)->get();
        $data->industryTypes = Utils\Helper::aggregateForSelect($industryTypes, 'industry_id', 'name');

        $this->layout->content = View::make('client.register')->with('data', $data);
    }

    public function save() {
        $input = Input::all();

        $clientObj = Model\Client::make();
        
        if ($clientObj->validate($input)) {
            
            $password = Security\Helper::generatePassword($input['first_name'], $input['last_name']);

            $clientObj->company_name = $input['company_name'];
            $clientObj->first_name = $input['first_name'];
            $clientObj->last_name = $input['last_name'];
            $clientObj->industry_id = $input['industry_id'];
            $clientObj->email = $input['email'];
            $clientObj->phone = $input['phone'];
            $clientObj->mobile = $input['mobile'];
            $clientObj->fax = $input['fax'];
            $clientObj->address = $input['address'];
            $clientObj->country = $input['country'];
            $clientObj->city = $input['city'];
            $clientObj->postal_code = $input['postal_code'];
            $clientObj->province = $input['province'];
            $clientObj->requirement_id = $input['requirement_id'];
            $clientObj->terms = $input['terms'] == 'on' ? true : false;
            $clientObj->status = true;
            $clientObj->username = Security\Helper::generateUsername($input['first_name'], $input['last_name']);
            $clientObj->password = sha1($password);
            $clientObj->reminder_token = Security\Helper::generateReminderToken($clientObj->username);
            $clientObj->save();

            return Redirect::to('client/login');
        } else {
            $failed = $clientObj->errors->messages()->all();

            Session::flash('client_register_errors', $failed);
            return Redirect::to('client/register');
        }
    }

    public function dashboard() {
        $data = new stdClass();
        $this->layout->content = View::make('client.dashboard')->with('data', $data);
    }

    public function loginAuthorize() {
        $input = Input::all();

        if (Session::has('_token') && isset($input['_token'])) {
            //check token
            if ($input['_token'] == Session::get('_token')) {
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
            }
        }
        return Redirect::to('client/login');
    }

    public function logout() {
        Session::forget('client_id');
        return Redirect::to('client/login');
    }

    public function searchContractors() {
        $data = new stdClass();

        $input = Input::all();
        $arrParams = array(
            'first_name' => isset($input['first_name']) ? $input['first_name'] : '',
            'last_name' => isset($input['last_name']) ? $input['last_name'] : '',
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
        $paramsSession = Session::get($hashTokenSession);

        $resultsObj = new Model\Contractor();
        if (is_array($paramsSession) && count($paramsSession) > 0) {
            foreach ($paramsSession as $key => $value) {
                if ($value == '') {
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

    public function interviews($interviewType) {
        $data = new stdClass();

        switch ($interviewType) {
            case 'required':
                $data->title = 'Required';
                break;
            case 'replaced':
                $data->title = 'Replaced';
                break;
            case 'accepted':
                $data->title = 'Accepted';
                break;
        }
        $this->layout->content = View::make('client.interview')->with('data', $data);
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
