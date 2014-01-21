<?php
namespace Api\V1\Rest\ExternalServicePlace;

class ExternalServicePlaceEntity
{
    protected $code;
    protected $status;
    protected $stat = array();
    protected $reason;

    public function __construct(array $entity = null)
    {
        if (!empty($entity)) {
            $this->setData($entity);
        }
    }

    public function setData($data)
    {
        if ($data !== null && is_array($data)) {
            foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
                if (isset($data[$key])) {
                    $this->$key = $data[$key];
                }
            }
        }

        return $this;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return array
     */
    public function getStat()
    {
        return $this->stat;
    }

    /**
     * @param array $stat
     */
    public function setStat($stat)
    {
        $this->stat = $stat;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
}
