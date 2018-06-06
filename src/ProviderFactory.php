<?php

namespace Jimdo;

class ProviderFactory
{
    /** create instance from  given provider
     * @param $provider
     * @return mixed
     */
    public static function create($provider)
    {

        $provider=ucfirst($provider).'Provider';
        $className = __NAMESPACE__ . '\\Providers\\' . $provider;

        if(class_exists($className)) {
            return new $className();
        }
    }
}
