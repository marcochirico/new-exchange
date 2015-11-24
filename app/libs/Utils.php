<?php

namespace Utils;

Class Helper {

    public static function showValidatorErrorsListed($errors) {
        $messages = array();
        foreach ($errors as $e) {
            $messages[] = '<li>' . $e . '</li>';
        }
        return '<ul>' . implode('', $messages) . '</ul>';
    }

}
