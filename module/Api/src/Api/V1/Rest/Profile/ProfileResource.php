<?php
namespace Api\V1\Rest\Profile;

use Api\Entity\ApiStaticErrorList;
use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ProfileResource extends AbstractResourceListener
{
    protected $userModel;

    public function __construct($userModel = null, $userEntity = null)
    {
        $this->userModel = $userModel;
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
        $data = $this->userModel->createOrUpdate(get_object_vars($data));
        if (!empty($data)) {
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
        $data = $this->userModel->fetch(array('uuid' => $id));
        if (!empty($data)) {
            return new ProfileEntity($data->getData());
        } else {
            return ApiStaticErrorList::getError(404);
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
        $data = $this->userModel->fetchAll(array());

        if (!empty($data)) {
            $resultArray = array();
            foreach ($data as $d) {
                array_push($resultArray, new ProfileEntity($d->getData()));
            }
            $adapter = new ArrayAdapter($resultArray);
            $collection = new ProfileCollection($adapter);
        } else {
            return ApiStaticErrorList::getError(404);
        }

        if (!empty($collection)) {
            if (!empty($params['page'])) {
                return $collection;
            } else {
                return $resultArray;
            }
        } else {
            return ApiStaticErrorList::getError(404);
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
        $data = $this->userModel->createOrUpdate(get_object_vars($data), $id);
        if (!empty($data)) {
            return ApiStaticErrorList::getError(202);
        } else {
            return ApiStaticErrorList::getError(404);
        }
    }
}
