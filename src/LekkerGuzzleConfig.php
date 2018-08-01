<?php

namespace GuzzleHttp;

/**
 * Class LekkerGuzzleConfig
 * @package GuzzleHttp
 */
class LekkerGuzzleConfig
{
    /**
     * @var array
     */
    private static $config = [];

    /**
     * Private constructor ensures the class can be initialized only from
     * itself.
     */
    private function __construct()
    {
    }

    /**
     * @param $key
     * @param $value
     */
    public static function setConfigItem($key, $value)
    {
        self::$config[$key] = $value;
    }

    /**
     * @param $key_value_array
     */
    public static function setConfig($key_value_array)
    {
        self::$config = $key_value_array;
    }

    /**
     * @param $key
     * @param null $fallback
     * @return null
     */
    public static function getConfigItem($key, $fallback = null)
    {
        return self::$config[$key] ?: $fallback;
    }

    /**
     * @throws \Exception to prevent cloning object.
     */
    public function __clone()
    {
        throw new \Exception('You cannot clone singleton object');
    }
}