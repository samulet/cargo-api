<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 4/24/13
 * Time: 1:35 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Account\Model;

use Account\Entity\Account;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;


class AccountModel
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
        $qb = $this->documentManager->getRepository('Account\Entity\Account')->findOneBy(array('uuid' => $accUuid));
        return $qb->getId();
    }

    public function getComIdByUUID($accUuid)
    {
        $qb = $this->documentManager->getRepository('Account\Entity\Company')->findOneBy(array('uuid' => $accUuid));
        return $qb->getId();
    }

    public function returnAccounts($orgId, $number = '30', $page = '1')
    {
        $org_obj = $this->documentManager->getRepository('Account\Entity\Account')->getMyAvailableAccount($orgId);
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

    public function createAccount($post, $user_id, $accId)
    {
        $this->documentManager = $this->getServiceLocator()->get('');
        $propArray = get_object_vars($post);

        if (!empty($accId)) {
            $acc = $this->documentManager->getRepository('Account\Entity\Account')->findOneBy(
                array('id' => new \MongoId($accId))
            );
        }
        else {
            $acc = new Account($user_id);
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

    public function createOrUpdate($data, $uuid = null) {
        if(empty($uuid)) {
            $acc = new Account();
        } elseif($this->uuidGenerator->isValid($uuid)) {
            $acc = $this->documentManager->getRepository('Account\Entity\Account')->findOneBy(
                array('uuid' => $uuid));
        } else {
            return null;
        }
        $acc->setData($data);
        $this->documentManager->persist($acc);
        $this->documentManager->flush();
        return $acc;
    }
    public function increaseLastItemNumber($orgId, $lastItemNumber)
    {
        $this->documentManager->getRepository('Account\Entity\Account')->createQueryBuilder()

            ->findAndUpdate()
            ->field('id')->equals(new \MongoId($orgId))
            ->field('lastItemNumber')->set($lastItemNumber)
            ->getQuery()
            ->execute();
    }

    public function fetch($findParams) {

            $accs = $this->queryBuilderModel->createQuery($this->documentManager->createQueryBuilder('Account\Entity\Account'), $findParams)->getQuery()->execute();
            if(empty($accs)) {
                return null;
            } else {
                return $this->queryBuilderModel->getObjectData($accs);
            }
    }


    public function getAccount($id)
    {
        if (empty($id)) {
            return null;
        }
        $acc = $this->documentManager->getRepository('Account\Entity\Account')->findOneBy(array('uuid' => $id));
        if (empty($acc)) {
            $acc = $this->documentManager->getRepository('Account\Entity\Account')->findOneBy(array('id' => new \MongoId($id)));
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
        $orgs = $this->documentManager->getRepository('Account\Entity\Account')->createQueryBuilder()
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

    public function getCompanyModel()
    {
        return $this->companyModel;
    }

    public function getCompanyUserModel()
    {
        return $this->companyUserModel;
    }

    public function delete($uuid)
    {
        $accId=$this->getAccIdByUUID($uuid);
        if(!empty($accId)) {
            $qb = $this->documentManager->getRepository('Account\Entity\Account')->find(new \MongoId($accId));
            $this->documentManager->remove($qb);
            $this->documentManager->flush();

            $qb2 = $this->documentManager->createQueryBuilder('Account\Entity\CompanyUser');
            $qb2->remove()->field('orgId')->equals(new \MongoId($accId))->getQuery()
                ->execute();

            $qb3 = $this->documentManager->getRepository('Account\Entity\Company')->findBy(
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
            return array('success' => true);
        } else {
            return null;
        }

    }

    public function getOrgByUserId($userId)
    {

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

}