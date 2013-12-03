<?php
namespace Api\V1\Rest\Account;

class AccountEntity {
    private $account_uuid;
    protected $uuid;
    protected $title;
    //   protected $_embedded;
    public function __construct(array $entity = null){
        $this->setData($entity);
        $this->account_uuid=123;
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
    public function getUuid()
    {
        return $this->uuid;
    }
    //public function generateLink(){
     //   $this->_links=array(
     //       array('self' => )
     //   );
  //  }
}
