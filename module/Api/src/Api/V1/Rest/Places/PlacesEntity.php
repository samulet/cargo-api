<?php
namespace Api\V1\Rest\Places;

use Zend\Stdlib\ArraySerializableInterface;

class PlacesEntity implements ArraySerializableInterface
{
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
