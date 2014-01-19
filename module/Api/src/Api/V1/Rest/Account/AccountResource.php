<?php
namespace Api\V1\Rest\Account;

use Account\Model\AccountModel;
use Account\Model\CompanyModel;
use Account\Model\CompanyUserModel;
use Api\Entity\ApiStaticErrorList;
use Application\Service\AuthorizationServiceAwareInterface;
use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use ZfcRbac\Exception\UnauthorizedException;
use ZfcRbac\Service\AuthorizationService;

class AccountResource extends AbstractResourceListener implements AuthorizationServiceAwareInterface
{
    /**
     * @var AccountModel
     */
    protected $accountModel;
    /**
     * @var CompanyUserModel
     */
    protected $companyUserModel;
    /**
     * @var CompanyModel
     */
    protected $companyModel;
    /**
     * @var AuthorizationService
     */
    protected $authorizationService;

    public function __construct($accountModel, $companyUserModel, $companyModel)
    {
        $this->accountModel = $accountModel;
        $this->companyUserModel = $companyUserModel;
        $this->companyModel = $companyModel;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     *
     * @throws \ZfcRbac\Exception\UnauthorizedException
     * @return ApiProblem|AccountEntity
     */
    public function create($data)
    {
        if (!$this->authorizationService->isGranted('account.create')) {
            throw new UnauthorizedException('Insufficient permissions to perform the account creation', 403);
        }

        $data = $this->accountModel->createOrUpdate(get_object_vars($data));
        if (!empty($data)) {
            return new AccountEntity(array('uuid' => $data->getUuid(), 'title' => $data->getTitle()));
        } else {
            return ApiStaticErrorList::getError(404);
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
        $data = $this->accountModel->delete($id);
        if (!empty($data)) {
            return ApiStaticErrorList::getError(202);
        } else {
            return ApiStaticErrorList::getError(404);
        }
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
        $data = $this->accountModel->fetch(array('uuid' => $id, 'activated' => '1', 'deletedAt' => null));
        if (!empty($data)) {
            $dataArray = $data->getData();
            $dataCompanies = $this->companyModel->fetchAll(array('ownerAccUuid' => $dataArray['uuid']));
            return new AccountEntity($dataArray, $dataCompanies);
        } else {
            return ApiStaticErrorList::getError(404);
        }
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     *
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $data = $this->accountModel->fetchAll(array());
        $result = array();
        if (!empty($data)) {
            /** @var $d \Account\Entity\Account */
            foreach ($data as $d) {
                $entity = $d->getData();
                $companies = $this->companyModel->fetchAll(array('ownerAccUuid' => $entity['uuid']));
                array_push($result, new AccountEntity($entity, $companies));
            }
        }
        if (!empty($params['page'])) {
            return new AccountCollection(new ArrayAdapter($result));
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
     * @param  mixed $id
     * @param  mixed $data
     *
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $data = $this->accountModel->createOrUpdate(get_object_vars($data), $id);
        //тут еще функция, надо узнать как данные будут получаться
        if (!empty($data)) {
            return ApiStaticErrorList::getError(202);
        } else {
            return ApiStaticErrorList::getError(404);
        }
    }

    /**
     * @return AuthorizationService
     */
    public function getAuthorizationService()
    {
        return $this->authorizationService;
    }

    /**
     * @param AuthorizationService $authorizationService
     */
    public function setAuthorizationService(AuthorizationService $authorizationService)
    {
        $this->authorizationService = $authorizationService;
    }
}
