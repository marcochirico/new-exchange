<?php

namespace Model;

class ConsultingRole extends \Eloquent {

    protected $table = 'ne_consulting_roles';

    public static function make() {
        return new ConsultingRole();
    }

}
