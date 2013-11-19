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

    public function createOrUpdate($data, $uuid = null) {
        if(empty($uuid)) {
            $user = new User();
        } elseif($this->uuidGenerator->isValid($uuid)) {
            $user = $this->documentManager->getRepository('User\Entity\User')->findOneBy(
                array('uuid' => $uuid));
        } else {
            return null;
        }
        $user->setData($data);
        $this->documentManager->persist($user);
        $this->documentManager->flush();
        return $user;
    }
}