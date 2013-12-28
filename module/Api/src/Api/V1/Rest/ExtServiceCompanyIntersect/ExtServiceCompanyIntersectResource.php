<?php
namespace Api\V1\Rest\ExtServiceCompanyIntersect;

use ExtService\Model\ExternalCompanyIntersectModel;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Api\Entity\ApiStaticErrorList;
use Zend\Paginator\Adapter\ArrayAdapter;

class ExtServiceCompanyIntersectResource extends AbstractResourceListener
{
    /**
     * @var ExternalCompanyIntersectModel
     */
    protected $externalCompanyIntersectModel;
    /**
     * @var \User\Entity\User
     */
    protected $userEntity;

    public function __construct($externalCompanyIntersectModel = null, $userEntity = null)
    {
        $this->externalCompanyIntersectModel = $externalCompanyIntersectModel;
        $this->userEntity = $userEntity;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $entity = $this->externalCompanyIntersectModel->addCompanyIntersect(get_object_vars($data));
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
        return $this->externalCompanyIntersectModel->deleteCompanyIntersect($source, $id);
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
        $data = $this->externalCompanyIntersectModel->getExternalCompanyModel()->fetchAll($params);
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
