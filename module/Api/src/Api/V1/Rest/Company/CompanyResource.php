<?php
namespace Api\V1\Rest\Company;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Paginator\Adapter\ArrayAdapter;
use Api\Entity\ApiStaticErrorList;

class CompanyResource extends AbstractResourceListener
{
    protected $companyModel;
    protected $userEntity;

    public function __construct($companyModel = null, $userEntity=null)
    {
        $this->companyModel = $companyModel;
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
        $data=$this->companyModel->delete($id);
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
        $data=$this->companyModel->fetch(array('uuid'=>$id,'activated' => '1','deletedAt' => null));
        if(!empty($data)) {
            return new CompanyEntity($data->getData());
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
        $data=$this->companyModel->fetchAll($params);
        if(!empty($data)) {
            $resultArray=array();
            foreach($data as $d) {
                array_push($resultArray,new CompanyEntity($d->getData()));
            }
            $adapter = new ArrayAdapter($resultArray);
            $collection = new CompanyCollection($adapter);
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
        $data=$this->companyModel->createOrUpdate(get_object_vars($data),$id);
        $data['ownerAccUuid']=$this->getEvent()->getRouteParam('account_uuid');
        $data['uuid']=$this->getEvent()->getRouteParam('account_uuid');
        if(!empty($data)) {
            return ApiStaticErrorList::getError(202);
        } else {
            return ApiStaticErrorList::getError(404);
        }
    }
}
