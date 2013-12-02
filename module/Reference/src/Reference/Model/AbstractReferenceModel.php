<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 4/24/13
 * Time: 1:35 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Reference\Model;

use Reference\Entity\Reference;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;

abstract class AbstractReferenceModel
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
     * Создать или обновить аккаунт. Возвращает сущность созданного или модифицированого аккаунта
     *
     * @param array $data записываемый массив данных
     * @param string $uuid uuid модифицируемого аккаунта
     *
     * @return \Reference\Entity\Reference|null
     */
    public function createOrUpdate($data, $uuid = null) {
        return $this->queryBuilderModel->createOrUpdate('Reference\Entity\Reference',$data,$uuid);
    }

    /**
     * Возвращает сущность аккаунта по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \Reference\Entity\Reference|null
     */
    public function fetch($findParams) {
        return $this->queryBuilderModel->fetch('Reference\Entity\Reference',$findParams);
    }

    /**
     * Возвращает массив сущностей аккаунтов по поисковым параметрам
     *
     * @param array $findParams ассоциативный массив
     *
     * @return array(\Reference\Entity\Reference)|null
     */
    public function fetchAll($findParams) {
        return $this->queryBuilderModel->fetchAll('Reference\Entity\Reference',$findParams);
    }

    /**
     * Удалить аккаунт. При успехе возвращает uuid удаленого аккаунта
     *
     * @param string $uuid uuid аккаунта
     *
     * @return string|null
     */
    public function delete($uuid)
    {
        $accId=$this->getAccIdByUUID($uuid);
        if(!empty($accId)) {
            $qb = $this->documentManager->getRepository('Reference\Entity\Reference')->find(new \MongoId($accId));
            $this->documentManager->remove($qb);
            $this->documentManager->flush();

            $qb2 = $this->documentManager->createQueryBuilder('Reference\Entity\CompanyUser');
            $qb2->remove()->field('orgId')->equals(new \MongoId($accId))->getQuery()
                ->execute();

            $qb3 = $this->documentManager->getRepository('Reference\Entity\Company')->findBy(
                array('ownerAccId' => new \MongoId($accId))
            );
            $this->documentManager->remove($qb3);
            $this->documentManager->flush();

            $qb4 = $this->documentManager->getRepository('Resource\Entity\Resource')->findBy(
                array('ownerAccId' => new \MongoId($accId))
            );
            $this->documentManager->remove($qb4);
            $this->documentManager->flush();

            $qb5 = $this->documentManager->getRepository('Ticket\Entity\Ticket')->findBy(
                array('ownerAccId' => new \MongoId($accId))
            );

            $this->documentManager->remove($qb5);
            $this->documentManager->flush();
            return $uuid;
        } else {
            return null;
        }
    }

}