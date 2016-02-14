<?php

namespace Security;

Class Helper {

    public static function generateUsername($firstName, $lastName) {
        return strtolower(substr($firstName, 0, 1) . '.' . $lastName);
    }

    public static function generatePassword($firstName, $lastName) {
        $username = static::generateUsername($firstName, $lastName);
        return $username;
//        return substr(md5(time() . $username . time()), 0, 16);
    }

    public static function generateReminderToken($username) {
        return md5($username . time());
    }

    public static function getLoggedType() {
        if (\Session::has('contractor_id')) {
            return 'contractor';
        }
        if (\Session::has('client_id')) {
            return 'client';
        }
        return false;
    }

}
