<?php
namespace Api\V1\Rest\Company;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Paginator\Adapter\ArrayAdapter;

class CompanyResource extends AbstractResourceListener
{
    protected $companyModel;

    public function __construct($companyModel = null)
    {
        $this->companyModel = $companyModel;
    }
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $data=$this->companyModel->createOrUpdate($data);
        if(!empty($data)) {
            return new ApiProblem(204, 'Succesfully created');
        } else {
            return new ApiProblem(404, 'Error');
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
        $data=$this->companyModel->delete($id);
        if(!empty($data)) {
            return new ApiProblem(204, 'Succesfully deleted');
        } else {
            return new ApiProblem(404, 'Error');
        }
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
        $data=$this->companyModel->fetch(array('uuid'=>$id,'activated' => '1','deletedAt' => null));
        if(!empty($data)) {
            return $data;
        } else {
            return new ApiProblem(404, 'Error');
        }
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $data=$this->companyModel->fetchAll($params);
        $adapter = new ArrayAdapter($data);
        $collection = new AccountCollection($adapter);
        if(!empty($collection)) {
            return $collection;
        } else {
            return new ApiProblem(404, 'Error');
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
        $data=$this->companyModel->createOrUpdate($data,$id);
        if(!empty($data)) {
            return new ApiProblem(204, 'Succesfully added');
        } else {
            return new ApiProblem(404, 'Error');
        }
    }
}
