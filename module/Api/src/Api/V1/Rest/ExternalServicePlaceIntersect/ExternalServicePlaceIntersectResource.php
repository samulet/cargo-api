<?php
namespace Api\V1\Rest\ExternalServicePlaceIntersect;

use ExtService\Model\ExternalPunctIntersectModel;
use Place\Model\PlaceModel;
use User\Identity\IdentityProvider;
use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ExternalServicePlaceIntersectResource extends AbstractResourceListener
{
    /**
     * @var \ExtService\Model\ExternalPunctIntersectModel
     */
    protected $intersectModel;
    /**
     * @var \User\Identity\IdentityProvider
     */
    protected $identityProvider;
    /**
     * @var \Place\Model\PlaceModel
     */
    protected $placeModel;

    /**
     * @param \ExtService\Model\ExternalPunctIntersectModel $intersectModel
     * @param \Place\Model\PlaceModel $placeModel
     * @param \User\Identity\IdentityProvider $identityProvider
     */
    public function __construct(
        ExternalPunctIntersectModel $intersectModel,
        PlaceModel $placeModel,
        IdentityProvider $identityProvider
    ) {
        $this->intersectModel = $intersectModel;
        $this->placeModel = $placeModel;
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
        $this->intersectModel->setPlaceModel($this->placeModel);
        $entity = $this->intersectModel->addLink(get_object_vars($data));
        if (empty($entity)) {
            return false;
        }
        return new ExternalServicePlaceIntersectEntity($entity);
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        // если в $id нет "-" или он в начале строки - завершаем работу
        if (0 == strpos($id, '-')) {
            return false;
        }
        list($source, $type, $id) = explode('-', $id);
        return $this->intersectModel->deleteLink($source, $type, $id);
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
        $data = $this->intersectModel->getExternalPunctModel()->fetchAll(array());
        $result = array();
        foreach ($data as $d) {
            array_push($result, new ExternalServicePlaceIntersectEntity($d));
        }
        if (!empty($params['page'])) {
            return new ExternalServicePlaceIntersectCollection(new ArrayAdapter($result));
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
