<?php

class AdminController extends BaseController {

    protected $layout = 'admin.master';

    public function login() {

        $data = new stdClass();

        Session::reflash();
        $method = Request::method();

        switch ($method) {
            case'POST':

                $input = Input::get();

                $rules = array(
                    'email' => 'required|email',
                    'password' => 'required|min:4'
                );

                $validator = Validator::make($input, $rules);

                if ($validator->fails()) {
                    $messages = $validator->messages();
                    Session::flash('login_form_error', $messages);
                    return Redirect::to('admin/login');
                } else {
                    
                    if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) {
                                               
                        Session::set('logged_user', Auth::user());
                        return Redirect::to('admin/dashboard');
                    } else {
                        $messages = 'Authentication failed.';
                        Session::flash('login_auth_error', $messages);
                        return Redirect::to('admin/login');
                    }
                }
                break;
            case 'GET':

                return View::make('admin.login')->with('data', $data);
                break;
            default:
                break;
        }
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return Redirect::to('admin/login');
    }
    
    public function dashboard() {
        $data = new stdClass();
        $data->countContractors = Model\Contractor::where('status', 1)->count();
        $data->countClients = Model\Client::where('status', 1)->count();
        $data->countInterviews = Model\Interview::where('parent_interview_id', 0)->count();
        $data->countProjects = Model\Project::where('status', 1)->count();

        $this->layout->content = View::make('admin.index')->with('data', $data);
    }

}
