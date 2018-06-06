<?php

namespace Jimdo\Traits;

trait Payload{

    /**
     * @param $code
     * @param $message
     * @return string
     */
    public function fail($code,$message)
    {
        header('Content-Type: application/json');
        $response = ['status' => 'fail', 'code' => $code, 'message' => $message];

        return json_encode($response);
    }

    /**
     * @param $result
     * @return string
     */
    public function success($result)
    {
        header('Content-Type: application/json');
        $response = ['status' => 'success', 'code' => 200, 'data' => $result];

        return json_encode($response);
    }
}