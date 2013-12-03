<?php
namespace Api\V1\Rest\Account;


class AccountEntity{
    protected $uuid;
    protected $title;
    protected $companies;

    public function setData($data) {

        if($data !== null && is_array($data)){
            foreach(array_keys(get_class_vars(__CLASS__)) as $key) {
                if(isset($data[$key]) && ($key!='id') && ($key!='uuid') ){

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

    //public function generateLink(){
     //   $this->_links=array(
     //       array('self' => )
     //   );
  //  }
}
