<?php
namespace Api\V1\Rest\ExtServiceCompanyIntersect;

use Zend\Stdlib\ArraySerializableInterface;

class ExtServiceCompanyIntersectEntity implements ArraySerializableInterface
{
    protected $external_service_company_intersect_id;
    protected $id;
    protected $source;
    protected $name;
    protected $link;

    public function __construct(array $entity = null)
    {
        if (!empty($entity)) {
            $this->setData($entity);
            $this->external_service_company_intersect_id=$entity['source'].'/'.$entity['id'];
        }
    }

    public function setData($data)
    {
        if ($data !== null && is_array($data)) {
            foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
                if (isset($data[$key]) ) {
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
        if (!empty($this->created_at)) {
            $this->created_at=$this->created_at->getTimestamp();
        }

        return $data;
    }

    /**
     * @param string $external_service_place_intersect_id
     */
    public function setExternalServicePlaceIntersectId($external_service_place_intersect_id)
    {
        $this->external_service_place_intersect_id = $external_service_place_intersect_id;
    }

    /**
     * @return string
     */
    public function getExternalServicePlaceIntersectId()
    {
        return $this->external_service_place_intersect_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
    }
}
