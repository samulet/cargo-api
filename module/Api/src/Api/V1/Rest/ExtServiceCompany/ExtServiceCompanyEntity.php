<?php
namespace Api\V1\Rest\ExtServiceCompany;

class ExtServiceCompanyEntity
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
                if (isset($data[$key]) ) {
                    $this->$key = $data[$key];
                }
            }
        }

        return $this;
    }

    /**
     * @param mixed $external_code
     */
    public function setCode($external_code)
    {
        $this->code = $external_code;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param array $stat
     */
    public function setStat($stat)
    {
        $this->stat = $stat;
    }

    /**
     * @return array
     */
    public function getStat()
    {
        return $this->stat;
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
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }
}
