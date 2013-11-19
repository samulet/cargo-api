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

class UserModel
{
    protected $documentManager;
    protected $queryBuilderModel;

    public function __construct(DocumentManager $documentManager,$queryBuilderModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager=$documentManager;
        $this->queryBuilderModel=$queryBuilderModel;
    }

    public function fetch($findParams) {
        $user = $this->queryBuilderModel->createQuery($this->documentManager->createQueryBuilder('User\Entity\User'), $findParams)->getQuery()->getSingleResult();
        if(empty($user)) {
            return null;
        } else {
            return $user;
        }
    }

    public function fetchAll($findParams) {
        $users = $this->queryBuilderModel->createQuery($this->documentManager->createQueryBuilder('User\Entity\User'), $findParams)->getQuery()->execute()->toArray();
        if(empty($users)) {
            return null;
        } else {
            return $users;
        }
    }
}