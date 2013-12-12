<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 12/12/13
 * Time: 10:00 PM
 * To change this template use File | Settings | File Templates.
 */

namespace ExtService\Provider;


class OnlineProvider {
    protected $config;

    public function __construct($config)
    {
        $this->config=$config;
    }

    public function getList() {
        $resultArray = array();
        foreach($this->config as $key => $online) {
            array_push($resultArray, $key);
        }
        return $resultArray;
    }

    public function getServiceInfo($code) {
        return $this->config[$code];
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