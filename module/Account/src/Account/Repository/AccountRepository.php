<?php
namespace Account\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class AccountRepository extends DocumentRepository
{
    /**
     * @var \Doctrine\ODM\MongoDB\Query\Builder
     */
    protected $queryBuilder;

    /**
     * @return AccountRepository
     */
    public function exists()
    {
        $this->getQueryBuilder()->field('deleted')->equals(null);
        return $this;
    }

    /**
     * @return AccountRepository
     */
    public function active()
    {
        $this->getQueryBuilder()->field('activated')->equals(true);
        return $this;
    }

    /**
     * @return AccountRepository
     */
    public function notActive()
    {
        $this->getQueryBuilder()->field('activated')->equals(false);
        return $this;
    }

    /**
     * @param string $value
     *
     * @return AccountRepository
     */
    public function user($value)
    {
        $this->getQueryBuilder()->field('staff')->equals($value);
        return $this;
    }

    /**
     * @param string $value
     *
     * @return AccountRepository
     */
    public function uuid($value)
    {
        $this->getQueryBuilder()->field('uuid')->equals($value);
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
