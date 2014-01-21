<?php
namespace Reference\Entity;

class ReferenceList
{
    public $referenceList = array(
        'product-group' => array(
            'nameRus' => 'Продуктовая группа',
            'module' => 'ProductGroup'
        )
    );

    public function getList($listName)
    {
        if ( !empty($referenceList[$listName]) ) {
            return $referenceList[$listName];
        } else {
            return array();
        }
    }

    public function getListAll()
    {
        return $this->referenceList;
    }
}
