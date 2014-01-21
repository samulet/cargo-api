<?php
namespace Api\V1\Rest\AccessDenied;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Api\Entity\ApiStaticErrorList;

class AccessDeniedResource extends AbstractResourceListener
{
    /**
     * @var int
     */
    private $code;
    /**
     * @var string
     */
    private $message;

    public function __construct($code = 401, $message = '')
    {
        $this->code = $code;
        $this->message = $message;
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
        return ApiStaticErrorList::getError($this->code, $this->message);
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
        return ApiStaticErrorList::getError($this->code, $this->message);
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
        return ApiStaticErrorList::getError($this->code, $this->message);
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
        return ApiStaticErrorList::getError($this->code, $this->message);
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
        return ApiStaticErrorList::getError($this->code, $this->message);
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
        return ApiStaticErrorList::getError($this->code, $this->message);
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
        return ApiStaticErrorList::getError($this->code, $this->message);
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
        return ApiStaticErrorList::getError($this->code, $this->message);
    }
}
