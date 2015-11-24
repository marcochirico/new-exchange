<?php

namespace Model;

class Client extends \Eloquent {

    protected $table = 'ne_clients';
    
    protected $rules = array(
        'first_name' => 'required|min:2|max:255',
        'last_name' => 'required|min:2|max:255',
        'email' => 'required|email|unique:client',
        'email_confirm' => 'required|email|equal:email',
//        'birthday' => 'required|date|regex:/[0-9]{4}-[0-9]{2}-[0-9]{2}/',
//        'address' => 'required|min:2|max:255',
//        'city' => 'required|min:2|max:255',
//        'zipcode' => 'required|min:3|max:16',
//        'sex' => 'required|in:m,f',
//        'privacy' => 'required|accepted',
//        'terms' => 'required|accepted',
//        'safilo' => 'in:0,1'
    );
    
    var $errors;
    
    public static function make() {
        return new Client();
    }

    public function validate($data) {
        
        $validator = \Validator::make($data, $this->rules);
        
        if ($validator->fails()) {
            $this->errors = $validator;
            return false;
        }
        
        return true;
    }

}
