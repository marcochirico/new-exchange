<?php

namespace Response;

Class Helper {

    public static function ajaxError($message) {
        $data = array(
            'error' => true,
            'message' => $message,
            'html' => \Message\Helper::showErrorMessage($message)
        );
        return json_encode($data);
    }

    public static function ajaxDone($message) {
        $data = array(
            'error' => false,
            'message' => $message,
            'html' => \Message\Helper::showDoneMessage($message)
        );
        return json_encode($data);
    }

}
