<?php


namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class AddUser
{
    /**
     * @Assert\NotNull(message="")
     * @var
     */
    private $email;
    /**
     * @Assert\NotNull(message="")
     * @var
     */
    private $emailConfirm;
    /**
     * @Assert\NotNull(message="")
     * @var
     */
    private $password;
    /**
     * @Assert\NotNull(message="")
     * @var
     */
    private $passwordConfirm;

    /**
     * @return mixed
     */
    public function getEmailConfirm()
    {
        return $this->emailConfirm;
    }

    /**
     * @param mixed $emailConfirm
     */
    public function setEmailConfirm($emailConfirm): void
    {
        $this->emailConfirm = $emailConfirm;
    }

    /**
     * @return mixed
     */
    public function getPasswordConfirm()
    {
        return $this->passwordConfirm;
    }

    /**
     * @param mixed $passwordConfirm
     */
    public function setPasswordConfirm($passwordConfirm): void
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}