<?php
namespace Api\V1\Rest\ExtServiceCompanyIntersect;

use Account\Model\CompanyModel;
use ExtService\Model\ExternalCompanyIntersectModel;
use User\Identity\IdentityProvider;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Paginator\Adapter\ArrayAdapter;

class CompanyIntersectResource extends AbstractResourceListener
{
    /**
     * @var ExternalCompanyIntersectModel
     */
    protected $intersectModel;
    /**
     * @var CompanyModel
     */
    protected $companyModel;
    /**
     * @var \User\Identity\IdentityProvider
     */
    protected $identityProvider;

    public function __construct(
        ExternalCompanyIntersectModel $intersectModel,
        CompanyModel $companyModel,
        IdentityProvider $identityProvider
    ) {
        $this->intersectModel = $intersectModel;
        $this->companyModel = $companyModel;
        $this->identityProvider = $identityProvider;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $this->intersectModel->setInternalCompanyModel($this->companyModel);
        $entity = $this->intersectModel->addCompanyIntersect(get_object_vars($data));
        if (empty($entity)) {
            return false;
        }
        return new ExtServiceCompanyIntersectEntity($entity->getData());
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        // если в $id нет "-" или он в начале строки - завершаем работу
        if (0 == strpos($id, '-')) {
            return false;
        }
        list($source, $id) = explode('-', $id);
        return $this->intersectModel->deleteCompanyIntersect($source, $id);
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $data = $this->intersectModel->getExternalCompanyModel()->fetchAll($params);
        $result = array();
        foreach ($data as $d) {
            $entity = $d->getData();
            array_push($result, new ExtServiceCompanyIntersectEntity($entity));
        }
        $collection = new ExtServiceCompanyIntersectCollection(new ArrayAdapter($result));
        return $collection;
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
