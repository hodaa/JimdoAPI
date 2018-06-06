<?php

namespace Jimdo;


class Provider
{

    /**
     * @param $url
     * @return mixed
     */
    public function fetch($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($ch);

    }
}