<?php

namespace GuzzleHttp;

/**
 * Class LekkerRelay
 * @package GuzzleHttp
 */
class LekkerRelay
{
    /**
     * @var
     */
    protected $uri;

    /**
     * LekkerRelay constructor.
     * @param $uri
     */
    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        if ($this->shouldRelay()) {
            $this->uri = LekkerGuzzleConfig::getConfigItem('endpoint', 'https://capturethis.io/') . '/' . $this->uri;
        }

        return $this->uri;
    }

    /**
     * @return bool|null
     */
    protected function shouldRelay()
    {
        $should_relay = LekkerGuzzleConfig::getConfigItem('enabled', false);

        if ($this->hasWhiteList() && $this->checkWhitelist() == false) {
            $should_relay = false;
        }

        if ($this->hasBlacklist() && $this->checkBlacklist()) {
            $should_relay = false;
        }

        return $should_relay;
    }

    /**
     * @return bool
     */
    protected function hasWhiteList()
    {
        return LekkerGuzzleConfig::getConfigItem('whitelist', false) !== false;
    }

    /**
     * @return bool
     */
    protected function hasBlackList()
    {
        return LekkerGuzzleConfig::getConfigItem('blacklist', false) !== false;
    }

    /**
     * @return bool
     */
    protected function checkWhitelist()
    {
        if ($this->in_arrayi($this->getDomain(), LekkerGuzzleConfig::getConfigItem('whitelist', []))) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    protected function checkBlacklist()
    {
        if ($this->in_arrayi($this->getDomain(), LekkerGuzzleConfig::getConfigItem('blacklist', []))) {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    protected function getDomain()
    {
        return parse_url($this->uri, PHP_URL_HOST);
    }

    /**
     * @param $needle
     * @param $haystack
     * @return bool
     */
    protected function in_arrayi($needle, $haystack)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }
}