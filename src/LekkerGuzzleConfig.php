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
     * @var array
     */
    private static $global_headers = [];

    /**
     * @var array
     */
    private static $global_user = [];

    /**
     * @var array
     */
    private static $global_data = [];


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
        return !isset(self::$config[$key]) || empty($config[$key]) ? $fallback : self::$config[$key];
    }

    /**
     * @param $key
     * @param $value
     */
    public static function setGlobalUserItem($key, $value)
    {
        self::$global_user[$key] = $value;
    }

    /**
     * @param $user_data
     */
    public static function setGlobalUser($user_data)
    {
        self::$global_user = $user_data;
    }

    /**
     * @param $key
     * @param $value
     */
    public static function setGlobalDataItem($key, $value)
    {
        self::$global_data[$key] = $value;
    }

    /**
     * @param $data_array
     */
    public static function setGlobalData($data_array)
    {
        self::$global_data = $data_array;
    }

    /**
     * @param $key
     * @param $value
     */
    public static function setGlobalHeader($key, $value)
    {
        self::$global_headers[$key] = $value;
    }

    /**
     * @return array
     */
    public static function getGlobalHeaders()
    {
        return self::$global_headers;
    }

    /**
     * @return array
     */
    public static function getGlobalUser()
    {
        return self::$global_user;
    }

    /**
     * @return array
     */
    public static function getGlobalData()
    {
        return self::$global_data;
    }

    /**
     * @throws \Exception to prevent cloning object.
     */
    public function __clone()
    {
        throw new \Exception('You cannot clone singleton object');
    }
}