<?php
namespace Api\V1\Rest\Places;

use Place\Model\PlaceModel;
use User\Identity\IdentityProvider;
use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class PlacesResource extends AbstractResourceListener
{
    /**
     * @var PlaceModel
     */
    protected $placeModel;
    /**
     * @var \User\Identity\IdentityProvider
     */
    protected $identityProvider;

    public function __construct(PlaceModel $placeModel, IdentityProvider $provider)
    {
        $this->placeModel = $placeModel;
        $this->identityProvider = $provider;
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
     *
     * @return PlacesCollection
     */
    public function fetchAll($params = array())
    {
        $result = array();
        $places = $this->placeModel->fetch();
        foreach ($places as $place) {
            $result[] = new PlacesEntity($place);
        }
        return new PlacesCollection(new ArrayAdapter($result));
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
