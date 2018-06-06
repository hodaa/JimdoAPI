<?php

namespace Jimdo\Providers;

use Jimdo\Provider;
use Jimdo\ProviderInterface;

class FoursquareProvider extends Provider implements ProviderInterface
{
    const API_URl = "https://api.foursquare.com/v2/venues/search";
    const CLIENT_ID = 'YXD2LEQGXQJJS34E2HJ1LOXLZCMYOOKJRFISCAB3QJRZOSIM';
    const CLIENT_SECRET = 'V0YW14ZJSORKSSKMPSHVINTO1X5C5WOHPD2MSKWRQ1JGATLH';
    const VERSION = '20160510';

    private $urlDetails;

    /**
     * FoursquareProvider constructor.
     */
    public function __construct()
    {
        $this->urlDetails = 'client_id=' . self::CLIENT_ID . '&client_secret=' . self::CLIENT_SECRET . '&v=' . self::VERSION;
    }

    /**
     * @param $query
     * @param $lat
     * @param $lng
     * @return array|mixed
     */
    public function search($query, $lat, $lng)
    {
        $lat = $lat ?? '30.0'; //lat for Egypt
        $lng = $lng ?? '31.2'; //lang for Egypt

        $uri = self::API_URl . '?' . $this->urlDetails . '&ll=' . $lat . ',' . $lng .'&query='.$query;
        $response = $this->fetch($uri);
        return $this->parse($response, 'Foursquare');
    }


    public function getDetails($venue_id)
    {
        $url = "https://api.foursquare.com/v2/venues/$venue_id?$this->urlDetails";
        return $this->fetch($url);
    }

    /**
     * @param $response
     * @param $provider
     * @return array|mixed
     */
    public function parse($response, $provider)
    {
        $result = [];
        $response = json_decode($response);
        $items = $response->response->venues;

        foreach ($items as $key => $item) {
//            $details = $this->getDetails($item->id);

            $lat = $item->location->lat ?? '';
            $lng = $item->location->lng ?? '';
            $result[$key]['id'] = $item->id ?? '';
            $result[$key]['provider'] = $provider;
            $result[$key]['name'] = $item->name ?? '';
            $result[$key]['description'] = $details->description ?? '';

            $result[$key]['location'] = $lat . ',' . $lng;
            $result[$key]['Address'] = $item->location->address ?? '';
//            $result[$key]['uri'] = $details->response->venue->url;
        }

        return $result;
    }
}
