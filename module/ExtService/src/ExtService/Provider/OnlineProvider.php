<?php
namespace ExtService\Provider;

class OnlineProvider
{
    protected $config;

    public function __construct($config = null)
    {
        $this->config=$config;
    }

    public function getList()
    {
        return array_keys($this->config);
    }

    public function getServiceInfo($code)
    {
        if (!empty($this->config[$code])) {
            return $this->config[$code];
        } else {
            return null;
        }
    }

    /**
     * @param mixed $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

}
