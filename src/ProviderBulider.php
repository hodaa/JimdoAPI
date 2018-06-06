<?php

namespace Jimdo;

use Jimdo\Traits\Payload;

class ProviderBulider
{
    private $query;
    private $lat;
    private $lng;

    use Payload;

    /**
     * ProviderBulider constructor.
     * @param $request
     */

    public function __construct($request)
    {
        if (!empty($request)) {
            if (isset($request['query'])) {
                $this->query = strip_tags(trim($request['query']));
            }
            if (isset($request['lat'])) {
                $this->lat = strip_tags(trim($request['lat']));
            }
            if (isset($request['lng'])) {
                $this->lat = strip_tags(trim($request['lng']));
            }
        } else {
            echo $this->validate($request);
            exit();
        }
    }


    /**check query is required
     * @param $request
     * @return string
     */
    public function validate($request)
    {
        if (!isset($request['query'])) {
            return $this->fail('422', "You should enter query to search");
        }
    }

    /**
     * loop for each provider and search by it.
     * @return string json
     */
    public function index()
    {
        $providers = require('./config.php');
        $result = [];
        foreach ($providers as $key => $item) {
            $obj = ProviderFactory::create($item);
            if (is_object($obj)) {
                $result[] = $obj->search($this->query, $this->lat, $this->lng);
            }
        }
        if (count($result) > 1) {
            $result = call_user_func_array('array_merge', $result);
        }
        return $this->success($result);
    }
}
