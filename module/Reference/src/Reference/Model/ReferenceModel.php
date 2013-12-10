<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 12/9/13
 * Time: 8:45 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Reference\Model;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Reference\Entity\ReferenceList;

class ReferenceModel {
    protected $documentManager;
    protected $uuidGenerator;
    protected $queryBuilderModel;
    protected $entityLink;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
    }

    /**
     * Возвращает массив всех справочников
     *
     * @return array(\Reference\Entity\ReferenceList)|null
     */
    public function fetchAll() {
        $list= new ReferenceList();
        $listAll=$list->getListAll();
        $resultArray=array();
        foreach($listAll as $key => $l) {
            $l['code']=$key;
            array_push($resultArray,$l);
        }
        return $resultArray;
    }

}