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

class ReferenceModel
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

    public function getAccIdByUUID($accUuid)
    {
        $qb = $this->documentManager->getRepository('Reference\Entity\Reference')->findOneBy(array('uuid' => $accUuid));
        return $qb->getId();
    }

    public function getComIdByUUID($accUuid)
    {
        $qb = $this->documentManager->getRepository('Reference\Entity\Company')->findOneBy(array('uuid' => $accUuid));
        return $qb->getId();
    }

    public function returnReferences($orgId, $number = '30', $page = '1')
    {
        $org_obj = $this->documentManager->getRepository('Reference\Entity\Reference')->getMyAvailableReference($orgId);
        if (empty($org_obj)) {
            return null;
        }
        foreach ($org_obj as $org_ob) {
            $acc = get_object_vars($org_ob);
            break;
        }
        if (empty($acc)) {
            return null;
        }
    //    $comModel = $this->getCompanyModel();
        //$com = $comModel->returnCompanies($orgId);
        $orgs = array();
        array_push($orgs, array('org' => $acc));
        return $orgs;
    }

    public function createReference($post, $user_id, $accId)
    {
        $this->documentManager = $this->getServiceLocator()->get('');
        $propArray = get_object_vars($post);

        if (!empty($accId)) {
            $acc = $this->documentManager->getRepository('Reference\Entity\Reference')->findOneBy(
                array('id' => new \MongoId($accId))
            );
        }
        else {
            $acc = new Reference($user_id);
        }
        $acc->setName($propArray['name']);

        $acc->setActivated(1);
        $accUuid = $acc->getUUID();
        $this->documentManager->persist($acc);
        $this->documentManager->flush();


        $accId = $this->getOrgIdByUUID($accUuid);

        $comUserModel = $this->getCompanyUserModel();
        $comUserModel->addUserToCompany($user_id, $accId, 'admin');

        $comUserModel->addOrgAndCompanyToUser(array('currentAcc' => $accId), $user_id);
        return true;
    }

    public function increaseLastItemNumber($orgId, $lastItemNumber)
    {
        $this->documentManager->getRepository('Reference\Entity\Reference')->createQueryBuilder()

            ->findAndUpdate()
            ->field('id')->equals(new \MongoId($orgId))
            ->field('lastItemNumber')->set($lastItemNumber)
            ->getQuery()
            ->execute();
    }

    public function getReference($id)
    {
        if (empty($id)) {
            return null;
        }
        $acc = $this->documentManager->getRepository('Reference\Entity\Reference')->findOneBy(array('uuid' => $id));
        if (empty($acc)) {
            $acc = $this->documentManager->getRepository('Reference\Entity\Reference')->findOneBy(array('id' => new \MongoId($id)));
        }
        if (empty($acc)) {
            return null;
        }

        $user = $this->documentManager->find('User\Entity\User', $acc->getOwnerId());

        if (empty($user)) {
            return null;
        }
        return get_object_vars($acc);
    }

    public function addIntNumber()
    {
        $orgs = $this->documentManager->getRepository('Reference\Entity\Reference')->createQueryBuilder()
            ->field('lastItemNumber')->equals(null)
            ->getQuery()
            ->execute()->toArray();
        $orgs['lastOrg']['id'] = null;
        foreach ($orgs as $acc) {

            if (!empty($acc->id)) {
                $id = new \MongoId($acc->id);

            } else {
                $id = $acc['id'];
            }
            $lastItemNumber = 1;
            if (!empty($id)) {
                $tickets = $this->documentManager->getRepository('Ticket\Entity\Ticket')->createQueryBuilder()
                    ->field('ownerAccId')->equals($id)
                    ->field('numberInt')->equals(null)
                    ->getQuery()
                    ->execute();
            } else {
                $tickets = $this->documentManager->getRepository('Ticket\Entity\Ticket')->createQueryBuilder()
                    ->field('numberInt')->equals(null)
                    ->getQuery()
                    ->execute();
            }
            foreach ($tickets as $ticket) {

                $this->documentManager->getRepository('Ticket\Entity\Ticket')->createQueryBuilder()
                    ->findAndUpdate()
                    ->field('id')->equals(new \MongoId($ticket->id))
                    ->field('numberInt')->set($lastItemNumber)
                    ->getQuery()
                    ->execute();
                $lastItemNumber++;
            }
            if (!empty($acc->id)) {
                //$this->increaseLastItemNumber($id,$lastItemNumber);
            }

        }
    }

    public function addBootstrap3Class(&$form)
    {

        foreach ($form as $el) {
            $attr = $el->getAttributes();
            if (!empty($attr['type'])) {
                if (($attr['type'] != 'checkbox') && ($attr['type'] != 'multi_checkbox')) {
                    $el->setAttributes(array('class' => 'form-control'));
                }
            }

        }
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