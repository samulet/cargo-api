<?php
namespace Api\V1\Rest\Reference;


class ReferenceEntity {
    protected $reference_group;
    protected $nameRus;

    public function __construct(array $entity = null){
        if(!empty($entity)) {
            $this->setData($entity);
            $this->reference_group=$entity['code'];
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
    public function getNameRus()
    {
        return $this->nameRus;
    }

    public function getReferenceGroup()
    {
        return $this->reference_group;
    }
}
