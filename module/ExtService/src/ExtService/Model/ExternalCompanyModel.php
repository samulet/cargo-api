<?php
namespace ExtService\Model;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;

class ExternalCompanyModel
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

    /**
     * @param $data
     * @param null $uuid
     *
     * @return mixed
     */
    public function createOrUpdate($data, $uuid = null)
    {
        return $this->queryBuilderModel->createOrUpdate('ExtService\Entity\ExternalCompany',$data,$uuid);
    }

    /**
     * @param $findParams
     * @return mixed
     */
    public function fetch($findParams)
    {
        return $this->queryBuilderModel->fetch('ExtService\Entity\ExternalCompany',$findParams);
    }

    /**
     * @param $findParams
     * @return mixed
     */
    public function fetchAll($findParams)
    {
        return $this->queryBuilderModel->fetchAll('ExtService\Entity\ExternalCompany',$findParams);
    }

    /**
     * @param $findParams
     * @return mixed
     */
    public function delete($findParams)
    {
        return $this->queryBuilderModel->delete('ExtService\Entity\ExternalCompany',$findParams);
    }

}
