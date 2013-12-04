<?php
namespace Api\V1\Rest\Account;

class AccountEntity {
    protected $account_uuid;
    protected $title;
    protected $created_at;
    protected $_embedded;

    public function __construct(array $entity = null,$companies = null, $_links = false){
        if(!empty($entity)) {
            $this->setData($entity);
            $this->account_uuid=$entity['uuid'];
            if(!empty($companies)) {
                $this->_embedded = array('companies'=>array());
                $this->setEmbedded($companies);
            }
        }
    }

    public function setData($data) {

        if($data !== null && is_array($data)){
            foreach(array_keys(get_class_vars(__CLASS__)) as $key) {
                if(isset($data[$key]) && ($key!='id')  ){
                    $this->$key = $data[$key];
                }
            }
        }
        return $this;

    }

    public function getData() {
        $data = array();
        foreach(array_keys(get_class_vars(__CLASS__)) as $key){
            $data[$key]=$this->$key;
        }
        return $data;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function getAccountUuid()
    {
        return $this->account_uuid;
    }

    public function setAccountUuid($account_uuid)
    {
        $this->account_uuid = $account_uuid;
        return $this;
    }

    public function setEmbedded($companies){
        foreach($companies as $com) {
            $arr= array(
                '_links' => array(
                    'self' => array(
                        'href' => '/api/accounts/'.$this->account_uuid.'/companies/'.$com->getUuid()
                    )
                ),
                'title' => $com->getProperty().' '.$com->getShort(),
                'company_uuid' => $com->getUuid()

            );
            array_push($this->_embedded['companies'], $arr);
        }
        return $this;
    }
    public function getEmbedded(){
        return $this->_embedded;
    }
}
