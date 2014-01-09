<?php
namespace Reference\Model;

use Reference\Entity\ProductGroup;

class ReferenceModel
{
    protected $referencesMap = array(
        ProductGroup::CODE => ProductGroup::TITLE,
    );

    /**
     * Возвращает массив всех справочников
     *
     * @return array
     */
    public function getList()
    {
        $result = array();
        foreach ($this->referencesMap as $code => $title) {
            $result[] = ['code' => $code, 'title' => $title];
        }

        return $result;
    }
}
