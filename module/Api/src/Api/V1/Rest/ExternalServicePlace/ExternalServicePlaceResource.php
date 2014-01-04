<?php
namespace Api\V1\Rest\ExternalServicePlace;

use Api\Entity\ApiStaticErrorList;
use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ExternalServicePlaceResource extends AbstractResourceListener
{
    protected $externalPlaceImportModel;
    /**
     * @var \User\Entity\User
     */
    protected $userEntity;

    public function __construct($externalPlaceImportModel = null, $userEntity = null)
    {
        $this->externalPlaceImportModel = $externalPlaceImportModel;
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
        $data = $this->externalPlaceImportModel->getInformationFromOnlineByOnlineName($id);
        if (!empty($data)) {
            return new ExternalServicePlaceEntity($data);
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
        $data = $this->externalPlaceImportModel->getInformationFromAllOnline();
        if (!empty($data)) {
            $resultArray = array();
            foreach ($data as $d) {
                array_push($resultArray, new ExternalServicePlaceEntity($d));
            }
            if (!empty($params['page'])) {
                $adapter = new ArrayAdapter($resultArray);
                return new ExternalServicePlaceCollection($adapter);
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
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
