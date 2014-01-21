<?php
namespace Api\V1\Rest\ProfileStatus;

class ProfileStatusEntity
{
    protected $profile_uuid;
    protected $code;
    protected $title;
    protected $description;

    public function __construct($companyModel = null, $userEntity=null)
    {
        $this->companyModel = $companyModel;
        $this->profile_uuid = $userEntity;
    }
}
