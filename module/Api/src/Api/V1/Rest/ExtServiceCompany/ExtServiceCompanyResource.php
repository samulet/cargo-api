<?php
namespace Api\V1\Rest\ExtServiceCompany;

use ExtService\Model\ExternalCompanyImportModel;
use User\Entity\User;
use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ExtServiceCompanyResource extends AbstractResourceListener
{
    /**
     * @var ExternalCompanyImportModel
     */
    protected $extServiceCompanyImportModel;

    public function __construct($extServiceCompanyImportModel)
    {
        $this->extServiceCompanyImportModel = $extServiceCompanyImportModel;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
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
     * @return ApiProblem|array
     */
    public function fetchAll($params = array())
    {
        $result = array();
        $statistic = $this->extServiceCompanyImportModel->getInformationFromAllOnline();
        if (!empty($statistic)) {
            foreach ($statistic as $serviceData) {
                array_push($result, new ExtServiceCompanyEntity($serviceData));
            }
        }
        if (!empty($params['page'])) {
            return new ExtServiceCompanyCollection(new ArrayAdapter($result));
        } else {
            return $result;
        }
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
