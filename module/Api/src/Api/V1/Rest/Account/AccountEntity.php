<?php
namespace Api\V1\Rest\Account;

class AccountEntity
{
    /**
     * @var string
     */
    protected $uuid;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var \DateTime
     */
    protected $created;
    /**
     * @var array
     */
    protected $_embedded;

    public function __construct(array $entity = null, $companies = null)
    {
        if (!empty($entity)) {
            $this->setData($entity);
            $this->uuid = $entity['uuid'];
            if (!empty($companies)) {
                $this->_embedded = array('companies' => array());
                $this->setEmbedded($companies);
            }
        }
    }

    public function setData(array $data)
    {
        if (!empty($data)) {
            foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
                if (isset($data[$key]) && ($key != 'id')) {
                    $this->$key = $data[$key];
                }
            }
        }
        if (!empty($this->created)) {
            $this->created = $this->created->getTimestamp();
        }

        return $this;

    }

    public function getData()
    {
        $data = array();
        foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
            $data[$key] = $this->$key;
        }

        return $data;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($account_uuid)
    {
        $this->uuid = $account_uuid;

        return $this;
    }

    public function setEmbedded($companies)
    {
        foreach ($companies as $com) {
            $arr = array(
                '_links' => array(
                    'self' => array(
                        'href' => '/api/accounts/' . $this->uuid . '/companies/' . $com->getUuid()
                    )
                ),
                'title' => $com->getProperty() . ' ' . $com->getShort(),
                'company_uuid' => $com->getUuid()

            );
            array_push($this->_embedded['companies'], $arr);
        }

        return $this;
    }

    public function getEmbedded()
    {
        return $this->_embedded;
    }
}
