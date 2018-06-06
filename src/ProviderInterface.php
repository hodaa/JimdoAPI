<?php

namespace  Jimdo{
    interface ProviderInterface
    {

        /**
         * @param $query
         * @param $latlng
         * @return mixed
         */
        public function search($query, $lat,$lng);


        /**
         * @param $response
         * @param $provider
         * @return mixed
         */
        public function parse($response, $provider);
    }
}
