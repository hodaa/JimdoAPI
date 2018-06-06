<?php
namespace Jimdo\Providers;

use Jimdo\Provider;
use Jimdo\ProviderInterface;

class GoogleProvider extends Provider implements ProviderInterface
{
    const API_URl = "https://maps.googleapis.com/maps/api/place/autocomplete/json";
    const API_KEY = "AIzaSyDpopuLKoVUEDwZ3Zt-0XfBTMVLvrVZz4A";


    public function search($query, $lat,$lng)
    {
        $url=self::API_URl . "?key=" . self::API_KEY . "&input=" . $query;
        $reponse=$this->fetch($url);
        return $this->parse($reponse,'Google Places');

    }
    public function parse($response, $provider)
    {
        $result = [];
        $response = json_decode($response);


        foreach ($response->predictions as $key => $item) {
            $result[$key]['id'] = $item->id;
            $result[$key]['provider'] = $provider;
            $result[$key]['name'] = $item->structured_formatting->main_text ?? '';
            $result[$key]['description'] = $item->description;

            $result[$key]['location'] = '';
            $result[$key]['Address'] = '';
            $result[$key]['uri'] = '';
        }
        return $result;
    }
}
