<?php

namespace Persons\Domain\Entity;

/**
 * Employee
 */
class Employee
{
    /** @var int */
    private $id;

    /** @var int */
    private $role;

    /** @var string */
    private $user;

    /** @var string */
    private $password;

    /** @var Person */
    private $person;

    /**
     * @param $newUser
     * @return Employee
     */
    public function changeUser($newUser)
    {
        $this->user = $newUser;
        return $this;
    }

    /**
     * @param $newPassword
     * @return Employee
     */
    public function changePassword($newPassword)
    {
        $this->password = $newPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function password()
    {
        return $this->password;
    }


}
