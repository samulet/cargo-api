<?php

namespace ExtService\Entity;

class ExtServicePunct
{
    protected $id;
    protected $city;
    protected $net;
    protected $st_id;
    protected $name;
    protected $adress;
    protected $phone;
    protected $consignee_name;
    protected $consignee;
    protected $activity;
    protected $is_local;
    protected $local_type_id;
    protected $id_1s;
    protected $direct_delivery;
    protected $unloading_time;
    protected $is_consolidating;
    protected $code_1c;
    protected $coordinates;

    /**
     * @param mixed $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return mixed
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * @return mixed
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $code_1c
     */
    public function setCode1c($code_1c)
    {
        $this->code_1c = $code_1c;
    }

    /**
     * @return mixed
     */
    public function getCode1c()
    {
        return $this->code_1c;
    }

    /**
     * @param mixed $consignee
     */
    public function setConsignee($consignee)
    {
        $this->consignee = $consignee;
    }

    /**
     * @return mixed
     */
    public function getConsignee()
    {
        return $this->consignee;
    }

    /**
     * @param mixed $consignee_name
     */
    public function setConsigneeName($consignee_name)
    {
        $this->consignee_name = $consignee_name;
    }

    /**
     * @return mixed
     */
    public function getConsigneeName()
    {
        return $this->consignee_name;
    }

    /**
     * @param mixed $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return mixed
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param mixed $direct_delivery
     */
    public function setDirectDelivery($direct_delivery)
    {
        $this->direct_delivery = $direct_delivery;
    }

    /**
     * @return mixed
     */
    public function getDirectDelivery()
    {
        return $this->direct_delivery;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id_1s
     */
    public function setId1s($id_1s)
    {
        $this->id_1s = $id_1s;
    }

    /**
     * @return mixed
     */
    public function getId1s()
    {
        return $this->id_1s;
    }

    /**
     * @param mixed $is_consolidating
     */
    public function setIsConsolidating($is_consolidating)
    {
        $this->is_consolidating = $is_consolidating;
    }

    /**
     * @return mixed
     */
    public function getIsConsolidating()
    {
        return $this->is_consolidating;
    }

    /**
     * @param mixed $is_local
     */
    public function setIsLocal($is_local)
    {
        $this->is_local = $is_local;
    }

    /**
     * @return mixed
     */
    public function getIsLocal()
    {
        return $this->is_local;
    }

    /**
     * @param mixed $local_type_id
     */
    public function setLocalTypeId($local_type_id)
    {
        $this->local_type_id = $local_type_id;
    }

    /**
     * @return mixed
     */
    public function getLocalTypeId()
    {
        return $this->local_type_id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $net
     */
    public function setNet($net)
    {
        $this->net = $net;
    }

    /**
     * @return mixed
     */
    public function getNet()
    {
        return $this->net;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $st_id
     */
    public function setStId($st_id)
    {
        $this->st_id = $st_id;
    }

    /**
     * @return mixed
     */
    public function getStId()
    {
        return $this->st_id;
    }

    /**
     * @param mixed $unloading_time
     */
    public function setUnloadingTime($unloading_time)
    {
        $this->unloading_time = $unloading_time;
    }

    /**
     * @return mixed
     */
    public function getUnloadingTime()
    {
        return $this->unloading_time;
    }
}