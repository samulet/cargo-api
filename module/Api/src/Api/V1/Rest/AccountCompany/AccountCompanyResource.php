<?php
namespace Api\V1\Rest\AccountCompany;

use Api\Entity\ApiStaticErrorList;
use Api\V1\Rest\Company;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Stdlib\Parameters;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

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
    /**
     * @var \User\Entity\User
     */
    protected $userEntity;

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
     *
     * @return ApiProblem
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
     *
     * @return ApiProblem
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
     * @return ApiProblem
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
     * @return ApiProblem
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param array|Parameters $params
     *
     * @return ApiProblem
     */
    public function fetchAll($params = array())
    {
        $accountUuid = $this->getEvent()->getRouteParam('account_uuid');
        if (empty($accountUuid)) {
            return new ApiProblem(400, 'Account UUID required');
        }

        $data = $this->companyModel->fetchAll(array('ownerAccUuid' => $accountUuid));

        $result = array();
        if (!empty($data)) {
            foreach ($data as $d) {
                array_push($result, new AccountCompanyEntity($d->getData()));
            }
        }
        if (!empty($params['page'])) {
            return new AccountCompanyCollection(new ArrayAdapter($result));
        } else {
            return $result;
        }
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     *
     * @return ApiProblem
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     *
     * @return ApiProblem
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
     *
     * @return ApiProblem
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
