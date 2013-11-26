<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 7/2/13
 * Time: 11:29 PM
 * To change this template use File | Settings | File Templates.
 */
namespace User\Model;

use Doctrine\ODM\MongoDB\DocumentNotFoundException;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use User\Entity\User;

class UserModel
{
    protected $documentManager;
    protected $queryBuilderModel;
    protected $uuidGenerator;

    public function __construct(DocumentManager $documentManager,$queryBuilderModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager=$documentManager;
        $this->queryBuilderModel=$queryBuilderModel;
    }

    public function createOrUpdate($data, $uuid = null) {
        return $this->queryBuilderModel->fetch('User\Entity\User',$data,$uuid);
    }

    public function fetch($findParams) {
        return $this->queryBuilderModel->fetch('User\Entity\User',$findParams);
    }

    public function fetchAll($findParams) {
        return $this->queryBuilderModel->fetchAll('User\Entity\User',$findParams);
    }

    public function getUserStatus($uuid) {
        $user=$this->queryBuilderModel->fetch('User\Entity\User',array('uuid' =>$uuid));
        return $user->getStatus();
    }
}