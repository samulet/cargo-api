<?php
namespace Api\V1\Rest\ReferenceProductGroup;

class ReferenceProductGroupEntity
{
    protected $code;
    protected $title;

    public function __construct(array $entity = null)
    {
        if (!empty($entity)) {
            $this->setData($entity);
        }
    }

    public function setData($data)
    {

        if ($data !== null && is_array($data)) {
            foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
                if (isset($data[$key]) && ($key != 'id')) {
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

        return $data;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCode()
    {
        return $this->code;
    }
}
