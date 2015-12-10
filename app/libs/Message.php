<?php

namespace Message;

Class Helper {

    public static function showErrorMessage($message) {
        return '<div class="alert alert-danger">' . $message . '</div>';
    }

    public static function showDoneMessage($message) {
        return '<div class="alert alert-success">' . $message . '</div>';
    }

}
