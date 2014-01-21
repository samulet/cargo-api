<?php
namespace Place\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class Place extends DocumentRepository
{
    /**
     * Возвращает список Пунктов без пометки "удалено"
     *
     * @param array    $sort  критерии сортировки возвращаемых записей
     * @param int|null $limit количество возращаемых данных
     * @param int|null $skip  количество пропускаемых записей
     *
     * @throws \InvalidArgumentException
     * @return \Doctrine\ODM\MongoDB\Cursor
     */
    public function getAvailablePlaces($sort = array(), $limit = null, $skip = null)
    {
        $builder = $this->createQueryBuilder();
        $builder->field('deleted')->equals(null);
        if ($limit) {
            if (!is_numeric($limit)) {
                throw new \InvalidArgumentException('Limit param must be integer');
            }
            $builder->limit((int) $limit);
        }
        if ($skip) {
            if (!is_numeric($skip)) {
                throw new \InvalidArgumentException('Skip param must be integer');
            }
            $builder->skip((int) $skip);
        }
        if (!empty($sort)) {
            if (!is_array($sort)) {
                throw new \InvalidArgumentException('Sort param must be array');
            }
            $builder->sort($sort);
        }

        return $builder->getQuery()->execute();
    }
}
