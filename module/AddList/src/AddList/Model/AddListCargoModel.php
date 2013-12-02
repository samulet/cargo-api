<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 4/24/13
 * Time: 1:35 PM
 * To change this template use File | Settings | File Templates.
 */
namespace AddList\Model;

use AddList\Entity\AddList;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Reference\Model\AbstractReferenceModel;

class AddListCargoModel extends AbstractReferenceModel
{
    protected $entityLink;

    public function __construct(DocumentManager $documentManager,$queryBuilderModel)
    {
        parent::__construct($documentManager,$queryBuilderModel);
        $this->entityLink='AddList\Entity\AddListCargo';
    }

    /**
     * Создать или обновить аккаунт. Возвращает сущность созданного или модифицированого аккаунта
     *
     * @param array $data записываемый массив данных
     * @param string $uuid uuid модифицируемого аккаунта
     *
     * @return \AddList\Entity\AddList|null
     */
    public function createOrUpdate($data, $uuid = null) {
        return $this->createOrUpdateAbstract($data,$uuid,$this->entityLink);
    }

    /**
     * Возвращает сущность аккаунта по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \AddList\Entity\AddList|null
     */
    public function fetch($findParams) {
        return $this->fetchAbstract($findParams,$this->entityLink);
    }

    /**
     * Возвращает массив сущностей аккаунтов по поисковым параметрам
     *
     * @param array $findParams ассоциативный массив
     *
     * @return array(\AddList\Entity\AddList)|null
     */
    public function fetchAll($findParams) {
        return $this->fetchAll($findParams,$this->entityLink);
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
       return $this->deleteAbstract($uuid,$this->entityLink);
    }

}