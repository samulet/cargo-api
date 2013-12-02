<?php
namespace Reference\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class ReferenceRepository extends DocumentRepository
{
    public function getMyAvailableReference($accId)
    {
        return $this->createQueryBuilder()
            ->field('deletedAt')->equals(null)->field('id')->equals(
                new \MongoId($accId)
            )
            ->getQuery()->execute();
    }
}