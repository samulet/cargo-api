<?php
namespace Api\V1\Rest\Profile;

use Api\Entity\ApiStaticErrorList;
use User\Identity\IdentityProvider;
use User\Model\UserModel;
use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ProfileResource extends AbstractResourceListener
{
    /**
     * @var \User\Model\UserModel
     */
    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     *
     * @return ProfileEntity
     */
    public function create($data)
    {
        try {
            $entity = $this->userModel->create(get_object_vars($data));
            $profileEntity = new ProfileEntity($entity->getData());
            return $profileEntity;
        } catch (\Exception $e) {
            error_log($e);
            throw $e;
        }
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
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
     * @param  mixed $data
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
     * @param  mixed $id
     *
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
        $entity = $this->userModel->update($id, get_object_vars($data));
        return new ProfileEntity($entity->getData());
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
