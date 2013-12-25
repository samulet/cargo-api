<?php
namespace Api\V1\Rest\AccountCompany;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Paginator\Adapter\ArrayAdapter;
use Api\V1\Rest\Company;
use Api\Entity\ApiStaticErrorList;

class AccountCompanyResource extends AbstractResourceListener
{
    /**
     * @var \Account\Model\CompanyModel
     */
    protected $companyModel;
    /**
     * @var \Account\Model\CompanyUserModel
     */
    protected $companyUserModel;

    public function __construct($companyModel = null, $companyUserModel = null, $userEntity = null)
    {
        $this->companyModel = $companyModel;
        $this->companyUserModel = $companyUserModel;
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
        $data = get_object_vars($data);
        $data['ownerAccUuid'] = $this->getEvent()->getRouteParam('account_uuid');
        $data = $this->companyModel->createOrUpdate($data);
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
        $accountUuid = $this->getEvent()->getRouteParam('account_uuid');
        $params = $params + array('ownerAccUuid' => $accountUuid);
        $data = $this->companyModel->fetchAll($params);
        if (!empty($data)) {
            $resultArray = array();
            foreach ($data as $d) {
                array_push($resultArray, new Company\CompanyEntity($d->getData()));
            }
            $adapter = new ArrayAdapter($resultArray);
            $collection = new Company\CompanyCollection($adapter);
        } else {
            return ApiStaticErrorList::getError(404);
        }
        if (!empty($collection)) {
            return $collection;
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
