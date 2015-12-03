<?php

namespace Model;

class News extends \Eloquent {
    
    protected $table = 'ne_news';
    protected $primaryKey = 'news_id';
    
    public static function make() {
        return new News();
    }

}
