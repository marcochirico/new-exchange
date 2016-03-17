<?php

namespace Feed;

Class Oracle {

    public static function get($url) {
//        return array();
        $output = array();
        if (\Cache::has('news_feed')) {
            $output = unserialize(\Cache::get('news_feed'));
        } else {
            $stream = simplexml_load_file($url);
            if ($stream) {
                if (count($stream->channel->item) > 0) {
                    $i = 0;
                    foreach ($stream->channel->item as $article) {
                        $article = (array) $article;
                        $output[$i]['title'] = $article['title'];
                        $output[$i]['link'] = $article['link'];

                        if ($i > 6) {
                            continue;
                        }
                        $i++;
                    }
                }
            }
            \Cache::put('news_feed', serialize($output), 60);
        }

        return $output;
    }

}
