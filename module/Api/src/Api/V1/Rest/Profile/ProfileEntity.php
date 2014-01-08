<?php
namespace Api\V1\Rest\Profile;

class ProfileEntity
{
    protected $uuid;
    protected $username;
    protected $email;
    protected $displayName;
    protected $password;
    protected $state;
    protected $created;
    protected $roles = array();
    protected $currentAcc;
    protected $currentCom;
    protected $deletedAt;
    protected $name = array();
    protected $docs = array();
    protected $snils;
    protected $inn;
    protected $phone = array();
    protected $site = array();
    protected $avatar;
    protected $sign = array();
    protected $social = array();
    protected $status = array();

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
                if (isset($data[$key]) && ($key != 'id')) {
                    $this->$key = $data[$key];
                }
            }
        }

        return $this;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($profile_uuid)
    {
        $this->uuid = $profile_uuid;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDocs()
    {
        return $this->docs;
    }

    public function setDocs($docs)
    {
        $this->docs = $docs;
        return $this;
    }

    public function getSnils()
    {
        return $this->snils;
    }

    public function setSnils($snils)
    {
        $this->snils = $snils;
        return $this;
    }

    public function getInn()
    {
        return $this->inn;
    }

    public function setInn($inn)
    {
        $this->inn = $inn;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setSite($site)
    {
        $this->site = $site;
        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }

    public function getSign()
    {
        return $this->sign;
    }

    public function setSign($sign)
    {
        $this->sign = $sign;
        return $this;
    }

    public function getSocial()
    {
        return $this->social;
    }

    public function setSocial($social)
    {
        $this->social = $social;
        return $this;
    }

    public function getCurrentAcc()
    {
        return $this->currentAcc;
    }

    public function getCurrentCom()
    {
        return $this->currentCom;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return UserInterface
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return UserInterface
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get displayName.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set displayName.
     *
     * @param string $displayName
     *
     * @return UserInterface
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return UserInterface
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get state.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get state.
     *
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set state.
     *
     * @param int $state
     *
     * @return UserInterface
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Get role.
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Add a role to the user.
     *
     * @param Role $role
     *
     * @return void
     */
    public function addRole($role)
    {
        $this->roles[] = $role;
    }

    public function getData()
    {
        $data = array();
        foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
            $data[$key] = $this->$key;
        }
        return $data;
    }

}
