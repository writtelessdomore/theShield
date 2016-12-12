<?php

namespace app;

/**
 * @author Alexandre PAVY <alexandre2@widop.com>
 */
class ShieldAPI
{
    const URL = "http://shield.fr/";

    /**
     */
    public function __construct()
    {
    }

    /**
     * @param $url
     *
     * @return string
     */
    public function getHttpRequest($url){
        return file_get_contents($url);
    }

    /**
     *
     */
    public function postHttpRequest(){
        $postdata = http_build_query(
            array(
                'var1' => 'du contenu',
                'var2' => 'doh'
            )
        );

        $opts = array('http' =>
                          array(
                              'method'  => 'POST',
                              'header'  => 'Content-type: application/x-www-form-urlencoded',
                              'content' => $postdata
                          )
        );

        $context = stream_context_create($opts);

        $result = file_get_contents('http://example.com/submit.php', false, $context);
    }
}
