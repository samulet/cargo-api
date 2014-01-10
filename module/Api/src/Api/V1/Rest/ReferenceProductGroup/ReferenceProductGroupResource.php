<?php
namespace Api\V1\Rest\ReferenceProductGroup;

use Api\Entity\ApiStaticErrorList;
use Reference\Model\ProductGroupModel;
use User\Identity\IdentityProvider;
use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ReferenceProductGroupResource extends AbstractResourceListener
{
    /**
     * @var ProductGroupModel
     */
    protected $productGroupModel;
    /**
     * @var \User\Identity\IdentityProvider
     */
    protected $identityProvider;

    /**
     * @param ProductGroupModel $productGroupModel
     * @param IdentityProvider $identityProvider
     */
    public function __construct(ProductGroupModel $productGroupModel = null, IdentityProvider $identityProvider = null)
    {
        $this->productGroupModel = $productGroupModel;
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
        $entity = $this->productGroupModel->create(get_object_vars($data));
        return new ReferenceProductGroupEntity($entity->getData());
    }

    /**
     * Delete a resource
     *
     * @param  string $id
     *
     * @return boolean
     */
    public function delete($id)
    {
        return $this->productGroupModel->delete($id);
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
        $data = $this->productGroupModel->fetch(array('code' => $id, 'deletedAt' => null));
        if (!empty($data)) {
            return new ReferenceProductGroupEntity($data->getData());
        } else {
            return ApiStaticErrorList::getError(404);
        }
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     *
     * @return ReferenceProductGroupCollection|array
     */
    public function fetchAll($params = array())
    {
        $result = array();
        foreach ($this->productGroupModel->fetchAll() as $entity) {
            array_push($result, new ReferenceProductGroupEntity($entity->getData()));
        }
        if (!empty($params['page'])) {
            return new ReferenceProductGroupCollection(new ArrayAdapter($result));
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
        $data = $this->productGroupModel->createOrUpdate(get_object_vars($data), $id);
        if (!empty($data)) {
            return ApiStaticErrorList::getError(202);
        } else {
            return ApiStaticErrorList::getError(404);
        }
    }
}
