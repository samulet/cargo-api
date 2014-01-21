<?php
namespace Reference\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class ProductGroup extends DocumentRepository
{
    /**
     * @var \Doctrine\ODM\MongoDB\Query\Builder
     */
    protected $queryBuilder;

    /**
     * @return ProductGroup
     */
    public function exists()
    {
        $this->getQueryBuilder()->field('deleted')->equals(null);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return ProductGroup
     */
    public function code($value)
    {
        $this->getQueryBuilder()->field('code')->equals($value);

        return $this;
    }

    public function fetchAll()
    {
        return $this->getQueryBuilder()->getQuery()->execute();
    }

    /**
     * @return array|null|object
     */
    public function fetchOne()
    {
        return $this->getQueryBuilder()->getQuery()->getSingleResult();
    }

    /**
     * @return \Doctrine\ODM\MongoDB\Query\Builder
     */
    public function getQueryBuilder()
    {
        if (empty($this->queryBuilder)) {
            $this->queryBuilder = $this->createQueryBuilder();
        }

        return $this->queryBuilder;
    }

    /**
     * @param \Doctrine\ODM\MongoDB\Query\Builder $queryBuilder
     */
    public function setQueryBuilder($queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }
}
