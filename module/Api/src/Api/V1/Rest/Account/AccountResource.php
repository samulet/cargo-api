<?php
namespace Api\V1\Rest\Account;

use Application\Service\AuthorizationServiceAwareInterface;
use ZF\Rest\AbstractResourceListener;
use Zend\Paginator\Adapter\ArrayAdapter;
use Api\Entity\ApiStaticErrorList;
use ZF\ApiProblem\ApiProblem;
use ZfcRbac\Exception\UnauthorizedException;
use ZfcRbac\Service\AuthorizationService;

class AccountResource extends AbstractResourceListener implements AuthorizationServiceAwareInterface
{
    protected $accountModel;
    protected $companyUserModel;
    protected $companyModel;
    /**
     * @var \User\Entity\User
     */
    protected $userEntity;

    /**
     * @var AuthorizationService
     */
    protected $authorizationService;

    public function __construct($accountModel = null,$companyUserModel = null, $companyModel = null, $userEntity=null)
    {
        $this->accountModel = $accountModel;
        $this->companyUserModel = $companyUserModel;
        $this->companyModel=$companyModel;
        $this->userEntity = $userEntity;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|AccountEntity
     */
    public function create($data)
    {
        if (!$this->authorizationService->isGranted('account.create')) {
            return ApiStaticErrorList::getError(403);
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
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $data=$this->accountModel->delete($id);
        if(!empty($data)) {
            return ApiStaticErrorList::getError(202);
        } else {
            return ApiStaticErrorList::getError(404);
        }
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
        $data=$this->accountModel->fetch(array('uuid'=>$id,'activated' => '1','deletedAt' => null));
        if(!empty($data)) {
            $dataArray=$data->getData();
            $dataCompanies=$this->companyModel->fetchAll(array('ownerAccUuid' => $dataArray['uuid']));
            return new AccountEntity($dataArray,$dataCompanies);
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
        $data=$this->accountModel->fetchAll($params);
        if(!empty($data)) {
            $resultArray=array();
            foreach($data as $d) {
                array_push($resultArray,new AccountEntity($d->getData()));
            }
            $adapter = new ArrayAdapter($resultArray);
            $collection = new AccountCollection($adapter);
        } else {
            return ApiStaticErrorList::getError(404);
        }
        if(!empty($collection)) {
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
        $data=$this->accountModel->createOrUpdate(get_object_vars($data),$id);
        //тут еще функция, надо узнать как данные будут получаться
        if(!empty($data)) {
            return ApiStaticErrorList::getError(202);
        } else {
            return ApiStaticErrorList::getError(404);
        }
    }

    /**
     * @param AuthorizationService $authorizationService
     */
    public function setAuthorizationService($authorizationService)
    {
        $this->authorizationService = $authorizationService;
    }

    /**
     * @return AuthorizationService
     */
    public function getAuthorizationService()
    {
        return $this->authorizationService;
    }
}
