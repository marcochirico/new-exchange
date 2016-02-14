<?php

namespace Utils;

Class Helper {

    public static function dateToDb($date) {
        list($dd, $mm, $yyyy) = explode('/', $date);
        return $yyyy . '-' . $mm . '-' . $dd;
    }

    public static function dateFromDb($date) {
        list($yyyy, $mm, $dd ) = explode('-', $date);
        return $dd . '/' . $mm . '/' . $yyyy;
    }

    public static function dateTimeFromDb($date) {
        $split = explode(' ', $date);
        list($yyyy, $mm, $dd ) = explode('-', $split[0]);
        return $dd . '/' . $mm . '/' . $yyyy . ' ' . $split[1];
    }

    public static function moneyFormat($value) {
        return number_format($value, 2, ',', '.');
    }

    public static function showValidatorErrorsListed($errors) {
        $messages = array();
        foreach ($errors as $e) {
            $messages[] = '<li>' . $e . '</li>';
        }
        return '<ul>' . implode('', $messages) . '</ul>';
    }

    public static function aggregateForSelect($data, $key, $col) {
        $aggregatedValues = array('-1' => 'Choose value');
        foreach ($data as $d) {
            $aggregatedValues[$d->$key] = $d->$col;
        }
        return $aggregatedValues;
    }

    public static function noResultsFound($message = null) {
        if (is_null($message)) {
            $message = 'No results found';
        }
        return '<div class="alert alert-warning">' . $message . '</div>';
    }
    
    public static function feedbackOutcome($status) {
        if($status==0) {
            return '<span class="label label-danger">Negative</span>';
        } else {
            return '<span class="label label-success">Positive</span>';
        }
    }

}
