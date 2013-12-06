<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 12/7/13
 * Time: 1:36 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Reference\AddList\ProductGroup\Model;

use Doctrine\ODM\MongoDB\DocumentManager;
use Reference\Model\AbstractReferenceModel;

class ProductGroupModel extends AbstractReferenceModel {
    public function __construct(DocumentManager $documentManager, $queryBuilderModel) {
        parent::__construct($documentManager,$queryBuilderModel);
        $this->entityLink='Reference\AddList\ProductGroup\Entity\ProductGroup';
    }

}