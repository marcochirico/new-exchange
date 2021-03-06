<?php

namespace Model;

class Project extends \Eloquent {

    protected $table = 'ne_projects';
    protected $primaryKey = 'project_id';

    public static function make() {
        return new Project();
    }
    
    public function contractor() {
        return $this->belongsTo('Model\Contractor');
    }

    public function client() {
        return $this->belongsTo('Model\Client');
    }
    
    public function timezone() {
        return $this->belongsTo('Model\Timezone');
    }
    
    public function currency() {
        return $this->belongsTo('Model\Currency');
    }

}
