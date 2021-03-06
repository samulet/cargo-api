<?php
namespace Api\V1\Rest\Places;

use Place\Model\PlaceModel;
use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class PlacesResource extends AbstractResourceListener
{
    /**
     * @var PlaceModel
     */
    protected $placeModel;

    public function __construct(PlaceModel $placeModel)
    {
        $this->placeModel = $placeModel;
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
        $place = $this->placeModel->create(get_object_vars($data));

        return new PlacesEntity($place);
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
        return $this->placeModel->delete($id);
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
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param array $params
     *
     * @return PlacesCollection|array
     */
    public function fetchAll($params = array())
    {
        $result = array();
        $places = $this->placeModel->fetch();
        foreach ($places as $place) {
            $result[] = new PlacesEntity($place);
        }
        if (!empty($params['page'])) {
            return new PlacesCollection(new ArrayAdapter($result));
        } else {
            return $result;
        }
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
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
