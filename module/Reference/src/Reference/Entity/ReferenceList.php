<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 12/6/13
 * Time: 10:59 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Reference\Entity;

class ReferenceList {
    public $referenceList = array(
        'product-group' => array(
            'nameRus' => 'Продуктовая группа',
            'module' => 'ProductGroup'
        )
    );

    public function getList($listName) {
        if( !empty($referenceList[$listName]) ) {
            return $referenceList[$listName];
        } else {
            return array();
        }
    }
}