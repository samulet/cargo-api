<?php
namespace Api\V1\Rest\AccountCompany;

class AccountCompanyEntity
{
    public $uuid;
    public $created;
    public $name;
    public $short;
    public $property;
    public $inn;
    public $ogrn;
    public $kpp;
    public $tax = array();
    public $addresses = array();
    public $contacts = array();
    public $forming_method;
    public $capital;
    public $founder_count;
    public $founders = array();
    public $authorized_persons = array();
    public $okved = array();
    public $pfr = array();
    public $fms = array();
    public $licenses = array();
    public $applicants = array();
    public $accounts = array();
    public $persons = array();
    public $sites = array();

    public function __construct(array $entity = null)
    {
        if (!empty($entity)) {
            foreach ($entity as $k => $val) {
                $this->$k = $val;
            }
        }
    }
}
