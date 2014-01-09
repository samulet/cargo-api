<?php
namespace Api\V1\Rest\Reference;

use Api\Entity\ApiStaticErrorList;
use Reference\Model\ReferenceModel;
use User\Identity\IdentityProvider;
use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ReferenceResource extends AbstractResourceListener
{
    /**
     * @var ReferenceModel
     */
    protected $referenceModel;
    /**
     * @var IdentityProvider
     */
    protected $identityProvider;

    public function __construct(ReferenceModel $referenceModel, IdentityProvider $identityProvider)
    {
        $this->referenceModel = $referenceModel;
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
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $data = $this->referenceModel->fetchAll(array());
        if (!empty($data)) {
            $resultArray = array();
            foreach ($data as $d) {
                array_push($resultArray, new ReferenceEntity($d));
            }
            $adapter = new ArrayAdapter($resultArray);
            $collection = new ReferenceCollection($adapter);
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
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
