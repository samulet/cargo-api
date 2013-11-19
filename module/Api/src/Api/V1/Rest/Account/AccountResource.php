<?php
namespace Api\V1\Rest\Account;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Paginator\Adapter\ArrayAdapter;

class AccountResource extends AbstractResourceListener
{
    protected $accountModel;
    protected $companyUserModel;

    public function __construct($accountModel = null,$companyUserModel = null)
    {
        $this->accountModel = $accountModel;
        $this->companyUserModel = $companyUserModel;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {

        $data=$this->accountModel->createOrUpdate($data);

        //тут еще функция, надо узнать как данные будут получаться  addUserToCompany($user_id, $accId, 'admin');
        if(!empty($data)) {
            return array($data);
        } else {
            return new ApiProblem(204, 'No content add');
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
        $data=$this->accountModel->delete($id);
        if(!empty($data)) {
            return array($data);
        } else {
            return new ApiProblem(204, 'No content found to delete');
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
        $data=$this->accountModel->fetch(array('uuid'=>$id,'activated' => '1','deletedAt' => null));
        if(!empty($data)) {
            return $data;
        } else {
            return new ApiProblem(204, 'No content');
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
        $data=$this->accountModel->fetchAll($params);
        $adapter = new ArrayAdapter($data);
        $collection = new AccountCollection($adapter);
        if(!empty($collection)) {
            return $collection;
        } else {
            return new ApiProblem(204, 'No content');
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
        $data=$this->accountModel->createOrUpdate($data,$id);
        //тут еще функция, надо узнать как данные будут получаться
        if(!empty($data)) {
            return array($data);
        } else {
            return new ApiProblem(204, 'No content add');
        }
    }
}
