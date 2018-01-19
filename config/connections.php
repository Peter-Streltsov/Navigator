<?php

namespace Scientometrics\Config;

class Connections
{
    private $instance;

    public static function generateDsn($driver, $host, $dbname)
    {
        return $driver.$host.$dbname;
    }
}
