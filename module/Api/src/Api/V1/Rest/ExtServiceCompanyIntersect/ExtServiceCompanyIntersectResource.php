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
        $data = get_object_vars($data);
        if (!empty($this->externalCompanyIntersectModel->addCompanyIntersect($data))) {
            return ApiStaticErrorList::getError(202);
        } else {
            return ApiStaticErrorList::getError(404);
        }
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $source = $this->getEvent()->getRouteParam('source');
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
        if (empty($data)) {
            return ApiStaticErrorList::getError(404);
        }

        $result = array();
        foreach ($data as $d) {
            array_push($result, new ExtServiceCompanyIntersectEntity($d->getData()));
        }
        return new ExtServiceCompanyIntersectCollection(new ArrayAdapter($result));
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
