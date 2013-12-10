<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 4/25/13
 * Time: 5:43 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Account\Model;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Zend\Crypt\Password\Bcrypt;

class CompanyUserModel {

    protected $documentManager;
    protected $uuidGenerator;
    protected $queryBuilderModel;

    public function __construct(DocumentManager $documentManager,$queryBuilderModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager=$documentManager;
        $this->queryBuilderModel=$queryBuilderModel;
    }


    public function addRole($userId, $roles, $comUuid)
    {
        $objectManager = $this->getServiceLocator()->get('doctrine.documentmanager.odm_default');
        $comModel = $this->getCompanyModel();
        $comId = $comModel->getCompanyIdByUUID($comUuid);

        $objectManager->getRepository('Account\Entity\CompanyUser')->createQueryBuilder()
            ->findAndUpdate()
            ->field('companyId')->equals(new \MongoId($comId))
            ->field('userId')->equals(new \MongoId($userId))
            ->field('roles')->set($roles)
            ->getQuery()
            ->execute();
        $user = $objectManager->getRepository('User\Entity\User')->findOneBy(
            array('id' => new \MongoId($userId), 'currentCom' => new \MongoId($comId))
        );
        if (!empty($user)) {
            $this->updateUserRoles($roles, $userId, array("forwarder", "carrier", "customer"));
        }
    }


    public function getRoles($userId, $comUuid)
    {
        if (empty($comUuid)) {
            return null;
        }
        $objectManager = $this->getServiceLocator()->get('doctrine.documentmanager.odm_default');
        $comModel = $this->getCompanyModel();
        $comId = $comModel->getCompanyIdByUUID($comUuid);
        $rolesObject = $objectManager->getRepository('Account\Entity\CompanyUser')->findOneBy(
            array('userId' => new \MongoId($userId), 'companyId' => new \MongoId($comId))
        );
        return $rolesObject->roles;
    }

    /**
     * Добавил или обновить юзера в компании. Возвращает сущность модифицированого юзера в компании.
     *
     * @param array $data записываемый массив данных
     * @param string $uuid uuid модифицируемого юзера
     *
     * @return \Account\Entity\Company|null
     */
    public function createOrUpdate($data, $uuid = null) {
        return $this->queryBuilderModel->fetch('Account\Entity\CompanyUser',$data,$uuid);
    }

}