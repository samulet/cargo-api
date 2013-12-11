<?php
namespace Api\V1\Rest\Company;


class CompanyEntity{

    protected $company_uuid;
    protected $created_at;
    protected $name;
    protected $short;
    protected $property;
    protected $inn;
    protected $ogrn;
    protected $kpp;
    protected $tax = array();
    protected $addresses = array();
    protected $contacts = array();
    protected $forming_method;
    protected $capital;
    protected $founder_count;
    protected $founders = array();
    protected $authorized_persons = array();
    protected $okved = array();
    protected $pfr = array();
    protected $fms = array();
    protected $licenses = array();
    protected $applicants = array();
    protected $accounts = array();
    protected $persons = array();
    protected $sites = array();

    public function __construct(array $entity = null){
        if(!empty($entity)) {
            $this->setData($entity);
            $this->company_uuid=$entity['uuid'];
        }
    }

    public function setData($data)
    {
        if ($data !== null && is_array($data)) {
            foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
                if (isset($data[$key]) && ($key != 'id') ) {
                    $this->$key = $data[$key];
                }
            }
        }
        return $this;

    }

    public function getData()
    {
        $data = array();
        foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
            $data[$key] = $this->$key;
        }
        if(!empty($this->created_at)) {
            $this->created_at=$this->created_at->getTimestamp();
        }
        return $data;
    }

    public function getCompanyUuid()
    {
        return $this->company_uuid;
    }

    public function setCompanyUuid($company_uuid = null)
    {
        $this->company_uuid = $company_uuid;
        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }


    public function getOwnerAccId()
    {
        return $this->ownerAccId;
    }

    public function setOwnerAccId($ownerAccId)
    {
        $this->ownerAccId = $ownerAccId;
        return $this;
    }


    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param string $name
     * @return AccountInterface
     */

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getShort()
    {
        return $this->short;
    }

    public function setShort($short)
    {
        $this->short = $short;
        return $this;
    }

    public function getProperty()
    {
        return $this->property;
    }

    public function setProperty($property)
    {
        $this->property = $property;
        return $this;
    }

    public function getInn()
    {
        return $this->inn;
    }

    public function setInn($inn)
    {
        $this->inn = $inn;
        return $this;
    }

    public function getOgrn()
    {
        return $this->ogrn;
    }

    public function setOgrn($ogrn)
    {
        $this->ogrn = $ogrn;
        return $this;
    }

    public function getKpp()
    {
        return $this->kpp;
    }

    public function setKpp($kpp)
    {
        $this->kpp = $kpp;
        return $this;
    }

    public function getTax()
    {
        return $this->tax;
    }

    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    public function getAddresses()
    {
        return $this->addresses;
    }

    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
        return $this;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
        return $this;
    }

    public function getFormingMethod()
    {
        return $this->formingMethod;
    }

    public function setFormingMethod($formingMethod)
    {
        $this->formingMethod = $formingMethod;
        return $this;
    }

    public function getCapital()
    {
        return $this->capital;
    }

    public function setCapital($capital)
    {
        $this->capital = $capital;
        return $this;
    }

    public function getFounderCount()
    {
        return $this->founderCount;
    }

    public function setFounderCount($founderCount)
    {
        $this->founderCount = $founderCount;
        return $this;
    }

    public function getFounders()
    {
        return $this->founders;
    }

    public function setFounders($founders)
    {
        $this->founders = $founders;
        return $this;
    }

    public function getAuthorizedPersons()
    {
        return $this->authorizedPersons;
    }

    public function setAuthorizedPersons($authorizedPersons)
    {
        $this->authorizedPersons = $authorizedPersons;
        return $this;
    }

    public function getOkved()
    {
        return $this->okved;
    }

    public function setOkved($okved)
    {
        $this->okved = $okved;
        return $this;
    }

    public function getPfr()
    {
        return $this->pfr;
    }

    public function setPfr($pfr)
    {
        $this->pfr = $pfr;
        return $this;
    }

    public function getFms()
    {
        return $this->fms;
    }

    public function setFms($fms)
    {
        $this->fms = $fms;
        return $this;
    }

    public function getLicenses()
    {
        return $this->licenses;
    }

    public function setLicenses($licenses)
    {
        $this->licenses = $licenses;
        return $this;
    }

    public function getApplicants()
    {
        return $this->applicants;
    }

    public function setApplicants($applicants)
    {
        $this->applicants = $applicants;
        return $this;
    }

    public function getAccounts()
    {
        return $this->accounts;
    }

    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
        return $this;
    }

    public function getPersons()
    {
        return $this->persons;
    }

    public function setPersons($persons)
    {
        $this->persons = $persons;
        return $this;
    }

    public function getSites()
    {
        return $this->sites;
    }

    public function setSites($sites)
    {
        $this->sites = $sites;
        return $this;
    }

}

