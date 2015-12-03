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

    public static function aggregateForSelect($data, $key, $col) {
        $aggregatedValues = array('-1' => 'Choose value');
        foreach ($data as $d) {
            $aggregatedValues[$d->$key] = $d->$col;
        }
        return $aggregatedValues;
    }

}
