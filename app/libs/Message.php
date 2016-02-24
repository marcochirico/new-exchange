<?php

namespace Message;

Class Helper {

    public static function showErrorMessage($message) {
        return '<div class="alert alert-danger">' . $message . '</div>';
    }

    public static function showErrorMessageListed($messages) {
        $html = '<div class="alert alert-danger"><ul>';
        if (is_array($messages) && count($messages) > 0) {
            foreach ($messages as $message) {
                $html.='<li>' . $message . '</li>';
            }
        }
        $html.='</ul></div>';

        return $html;
    }

    public static function showDoneMessage($message) {
        return '<div class="alert alert-success">' . $message . '</div>';
    }

}
