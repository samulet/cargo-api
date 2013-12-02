<?php
namespace AddList\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class AddListRepository extends DocumentRepository
{
    public function getMyAvailableAddList($accId)
    {
        return $this->createQueryBuilder()
            ->field('deletedAt')->equals(null)->field('id')->equals(
                new \MongoId($accId)
            )
            ->getQuery()->execute();
    }
}