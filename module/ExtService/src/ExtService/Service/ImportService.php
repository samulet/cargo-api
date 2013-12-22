<?php

namespace ExtService\Service;

class ImportService {

    protected function setCurl()
    {
        $ch = curl_init();
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        return $ch;
    }

    public function fetch($fullUrl, $params = null) {
        $paramsString = '';
        if(!empty($params)) {
            foreach($params as $key => $value) {
                $paramsString=$paramsString.'?'.$key.'='.$value;
            }
        }
        $ch = $this->setCurl();
        curl_setopt($ch, CURLOPT_URL, $fullUrl.$paramsString);
        $res = curl_exec($ch);
        return json_decode($res);
    }

    public function onlineGetToken($fullUrl)
    {
        $authToken = $this->fetch($fullUrl);
        if(!empty($authToken)) {
            if(!empty($authToken->token)) {
                return $authToken->token;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }


}