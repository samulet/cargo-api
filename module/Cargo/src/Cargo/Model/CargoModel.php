<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 4/24/13
 * Time: 1:35 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Cargo\Model;

use Cargo\Entity\Cargo;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;

class CargoModel
{
    protected $documentManager;
    protected $uuidGenerator;
    protected $queryBuilderModel;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
    }

    /**
     * Создать или обновить груз. Возвращает сущность созданного или модифицированого груза
     *
     * @param array $data записываемый массив данных
     * @param string $uuid uuid модифицируемого груза
     *
     * @return \Cargo\Entity\Cargo|null
     */
    public function createOrUpdate($data, $uuid = null)
    {
        return $this->queryBuilderModel->createOrUpdate('Cargo\Entity\Cargo', $data, $uuid);
    }

    /**
     * Возвращает сущность груза по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \Cargo\Entity\Cargo|null
     */
    public function fetch($findParams)
    {
        return $this->queryBuilderModel->fetch('Cargo\Entity\Cargo', $findParams);
    }

    /**
     * Возвращает массив сущностей грузов по поисковым параметрам
     *
     * @param array $findParams ассоциативный массив
     *
     * @return array(\Cargo\Entity\Cargo)|null
     */
    public function fetchAll($findParams)
    {
        return $this->queryBuilderModel->fetchAll('Cargo\Entity\Cargo', $findParams);
    }

    /**
     * Удалить груз. При успехе возвращает uuid удаленого груза
     *
     * @param string $uuid uuid груза
     *
     * @return string|null
     */
    public function delete($uuid)
    {
        $qb = $this->documentManager->getRepository('Cargo\Entity\Cargo')->findBy(array('uuid' => $uuid));
        $this->documentManager->remove($qb);
        $this->documentManager->flush();
    }

}