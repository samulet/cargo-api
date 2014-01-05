<?php
namespace Api\V1\Rest\ExternalServicePlaceIntersect;

class ExternalServicePlaceIntersectEntity
{
    /**
     * @var string
     */
    protected $code;
    /**
     * @var string
     */
    protected $link;
    /**
     * @var string
     */
    protected $source;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var array
     */
    protected $city;
    /**
     * @var array
     */
    protected $net;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var array
     */
    protected $legal;
    /**
     * @var string
     */
    protected $stId;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $adress;
    /**
     * @var string
     */
    protected $phone;
    /**
     * @var string
     */
    protected $consigneeName;
    /**
     * @var string
     */
    protected $consignee;
    /**
     * @var string
     */
    protected $activity;
    /**
     * @var string
     */
    protected $isLocal;
    /**
     * @var string
     */
    protected $localTypeId;
    /**
     * @var string
     */
    protected $id1s;
    /**
     * @var string
     */
    protected $directDelivery;
    /**
     * @var string
     */
    protected $unloadingTime;
    /**
     * @var string
     */
    protected $isConsolidating;
    /**
     * @var string
     */
    protected $code1c;
    /**
     * @var string
     */
    protected $coordinates;

    public function __construct(\ExtService\Entity\ExternalPunct $entity)
    {
        foreach ($entity->getData() as $k => $v) {
            $this->$k = $v;
        }
        $this->code = $entity->getSource() . '-' . $entity->getId();
    }
}
