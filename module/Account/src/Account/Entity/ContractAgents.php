<?php
namespace Account\Entity;

use Application\Entity\BaseEntity;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="contractAgents")
 * @Gedmo\SoftDeleteable(fieldName="deleted")
 */
class ContractAgents extends BaseEntity
{
    /**
     * @ODM\ObjectId
     * @var int
     */
    protected $comId;
    /**
     * @ODM\ObjectId
     * @var int
     */
    protected $accId;
    /**
     * @ODM\ObjectId
     * @var int
     */
    protected $contactAgentId;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $activated;

    public function __construct($itemId, $contactAgentId, $param)
    {
        if ($param == 'company') {
            $this->comId = $itemId;
        } else {
            $this->accId = $itemId;
        }
        $this->contactAgentId = $contactAgentId;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Description.
     *
     * @param string $description
     *
     * @return UserInterface
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
     *
     * @return UserInterface
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;

        return $this;
    }

    public function getUUID()
    {
        return $this->uuid;
    }

    public function setUUID($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getRequisites()
    {
        return $this->requisites;
    }

    public function setRequisites($requisites)
    {
        $this->requisites = $requisites;

        return $this;
    }

    public function getAddressFact()
    {
        return $this->addressFact;
    }

    public function setAddressFact($addressFact)
    {
        $this->addressFact = $addressFact;

        return $this;
    }

    public function getAddressReg()
    {
        return $this->addressReg;
    }

    public function setAddressReg($addressReg)
    {
        $this->addressReg = $addressReg;

        return $this;
    }

    public function getGeneralManager()
    {
        return $this->generalManager;
    }

    public function setGeneralManager($generalManager)
    {
        $this->generalManager = $generalManager;

        return $this;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getOwnerOrgId()
    {
        return $this->ownerAccId;
    }

    public function setOwnerOrgId($ownerAccId)
    {
        $this->ownerAccId = $ownerAccId;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return AccountInterface
     */
    public function setType($type)
    {
        $this->type = $type;

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
     *
     * @return AccountInterface
     */

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
