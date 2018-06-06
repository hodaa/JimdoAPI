<?php
require "vendor/autoload.php";

use Jimdo\ProviderBulider;

$obj = new ProviderBulider($_REQUEST);
echo $obj->index();

