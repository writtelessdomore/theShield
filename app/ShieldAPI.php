<?php

namespace App;

/**
 * @author Alexandre PAVY <alexandre2@widop.com>
 */
class ShieldAPI
{
    const URL = "http://shield.fr/";

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';

    /**
     */
    public function __construct()
    {
    }

    /**
     * @param       $method
     * @param       $url
     * @param array $params
     *
     * @return mixed
     */
    public function httpRequest($method, $url, $params = [])
    {
        $postdata = http_build_query(
            $params
        );

        $opts = [
            'http' =>
                [
                    'method'  => $method,
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata,
                ],
        ];

        $context = stream_context_create($opts);

        return json_decode(file_get_contents($this::URL.$url, false, $context));
    }

    /**
     * /shield/{id_client}/controllers
     *
     * @param $idClient
     *
     * @return mixed
     */
    public function getControllers($idClient)
    {
        $url = 'shield/'.$idClient.'/controllers';

        return $this->httpRequest($this::METHOD_GET, $url);
    }
}
