<?php
namespace Reference\ProductGroup\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class ProductGroupRepository extends DocumentRepository
{
    public function getMyAvailableProductGroup($accId)
    {
        return $this->createQueryBuilder()
            ->field('deletedAt')->equals(null)->field('id')->equals(
                new \MongoId($accId)
            )
            ->getQuery()->execute();
    }
}