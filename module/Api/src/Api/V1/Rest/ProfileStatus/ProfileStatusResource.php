<?php
namespace Api\V1\Rest\ProfileStatus;

use Api\Entity\ApiStaticErrorList;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ProfileStatusResource extends AbstractResourceListener
{
    protected $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Create a resource
     *
     * @param mixed $data
     *
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param mixed $id
     *
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param mixed $data
     *
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param mixed $id
     *
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $data = $this->userModel->getUserStatus($id);
        if (!empty($data)) {
            return new ProfileStatusEntity($data);
        } else {
            return ApiStaticErrorList::getError(404);
        }
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param array $params
     *
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param mixed $id
     * @param mixed $data
     *
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param mixed $data
     *
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param mixed $id
     * @param mixed $data
     *
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $data = $this->accountModel->createOrUpdate(array('status' => get_object_vars($data)), $id);
        if (!empty($data)) {
            return ApiStaticErrorList::getError(202);
        } else {
            return ApiStaticErrorList::getError(404);
        }
    }
}
