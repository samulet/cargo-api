<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 5/3/13
 * Time: 7:55 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Reference\Model;

use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;

class ReferenceModel
{
    protected $documentManager;
    protected $uuidGenerator;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager=$documentManager;
        $this->uuidGenerator = new UuidGenerator();
    }


}