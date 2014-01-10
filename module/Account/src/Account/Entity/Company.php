<?php
namespace Account\Entity;

use Application\Entity\BaseEntity;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="company", repositoryClass="Account\Repository\CompanyRepository")
 * @Gedmo\SoftDeleteable(fieldName="deleted")
 */
class Company extends BaseEntity
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $uuid;

    /**
     * @var string
     * @ODM\Field(type="string", name="owner")
     */
    protected $ownerAccUuid;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $activated;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $dirty;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $short;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $property;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $inn;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $ogrn;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $kpp;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $tax;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $addresses;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $contacts;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $forming_method;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $capital;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $founder_count;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $founders;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $authorized_persons;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $okved;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $pfr;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $fms;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $licenses;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $applicants;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $accounts;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $persons;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $sites;

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($uuid = null)
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function setDirty($dirty)
    {
        $this->dirty = $dirty;
    }

    public function getDirty()
    {
        return $this->dirty;
    }

    /**
     * Get activated.
     *
     * @return string activated
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * Set activated.
     *
     * @param string $activated
     * @return UserInterface
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
        return $this;
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

    /**
     * @param string $ownerAccUuid
     */
    public function setOwnerAccUuid($ownerAccUuid)
    {
        $this->ownerAccUuid = $ownerAccUuid;
    }

    /**
     * @return string
     */
    public function getOwnerAccUuid()
    {
        return $this->ownerAccUuid;
    }
}
