<?php
namespace Reference\Entity;

use Application\Entity\BaseEntity;
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
class ProductGroup extends BaseEntity
{
    const CODE = 'product-group';
    const TITLE = 'Продуктовые группы';

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
}
