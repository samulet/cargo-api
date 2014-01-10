<?php
namespace Reference\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="reference", repositoryClass="Reference\Repository\ProductGroup")
 * @ODM\DiscriminatorField("type")
 * @ODM\DiscriminatorMap({
 *      "prodgroup"="Reference\Entity\ProductGroup"
 * })
 * @Gedmo\SoftDeleteable(fieldName="deleted")
 */
class ProductGroup
{
    const CODE = 'product-group';
    const TITLE = 'Продуктовые группы';
    /**
     * @ODM\Id
     * @var int
     */
    protected $id;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $code;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $title;
    /**
     * @Gedmo\Timestampable(on="create")
     * @ODM\Date
     */
    protected $created;
    /**
     * @Gedmo\Timestampable(on="update")
     * @ODM\Date
     */
    protected $updated;
    /**
     * @ODM\Date
     */
    protected $deleted;
    /**
     * @var int
     * @ODM\Field(type="increment", name="v")
     */
    protected $version = 0;

    public function setData(array $data)
    {
        foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
            if ('id' == $key) {
                continue;
            }
            if (isset($data[$key])) {
                $this->$key = $data[$key];
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
        return $data;
    }

    public function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    public function incrementVersion()
    {
        ++$this->version;
    }
}
