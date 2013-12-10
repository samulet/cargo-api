<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 4/24/13
 * Time: 1:35 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Account\Model;

use Account\Entity\Company;

use Account\Entity\ContractAgents;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use User\Entity\User;

class CompanyModel
{
    protected $documentManager;
    protected $uuidGenerator;
    protected $queryBuilderModel;

    public function __construct(DocumentManager $documentManager,$queryBuilderModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager=$documentManager;
        $this->queryBuilderModel=$queryBuilderModel;
    }

    /**
     * Создать ии обновить компанию. Возвращает сущность созданной или модифицированой комнпании.
     *
     * @param array $data записываемый массив данных
     * @param string $uuid uuid модифицируемого аккаунта
     *
     * @return \Account\Entity\Company|null
     */
    public function createOrUpdate($data, $uuid = null) {
        return $this->queryBuilderModel->createOrUpdate('Account\Entity\Company',$data,$uuid);
    }

    /**
     * Возвращает сущность компании по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \Account\Entity\Company|null
     */
    public function fetch($findParams) {
        return $this->queryBuilderModel->fetch('Account\Entity\Company',$findParams);
    }

    /**
     * Возвращает массив сущностей компаний по поисковым параметрам
     *
     * @param array $findParams ассоциативный массив
     *
     * @return array(\Account\Entity\Company)|null
     */
    public function fetchAll($findParams) {
        return $this->queryBuilderModel->fetchAll('Account\Entity\Company',$findParams);
    }

    /**
     * Удалить юзера. При успехе возвращает uuid удаленой компании
     *
     * @param string $uuid uuid компании
     *
     * @return string|null
     */
    public function delete($uuid)
    {
        if(!empty($accId)) {
            $qb3 = $this->documentManager->getRepository('Account\Entity\Company')->findOneBy(
                array('uuid' => new \MongoId($uuid))
            );
            $this->documentManager->remove($qb3);
            $this->documentManager->flush();
            return $uuid;
        } else {
            return null;
        }
    }

}