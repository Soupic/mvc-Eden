<?php

namespace Model\Entity;

class User
{
	private $id;
	private $date_registration;
	private $pseudo;
	private $email;
	private $password;
	private $age;
	private $type;

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Gets the value of date_registration.
     *
     * @return mixed
     */
    public function getDateRegistration()
    {
        return $this->date_registration;
    }

    /**
     * Sets the value of date_registration.
     *
     * @param mixed $date_registration the date registration
     *
     * @return self
     */
    public function setDateRegistration($date_registration)
    {
        $this->date_registration = $date_registration;
    }

    /**
     * Gets the value of pseudo.
     *
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Sets the value of pseudo.
     *
     * @param mixed $pseudo the pseudo
     *
     * @return self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getAddMail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the add mail
     *
     * @return self
     */
    public function setAddMail($email)
    {
        $this->email = $email;
    }

    /**
     * Gets the value of password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the value of password.
     *
     * @param mixed $password the password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Gets the value of age.
     *
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Sets the value of age.
     *
     * @param mixed $age the age
     *
     * @return self
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * Gets the value of type.
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param mixed $type the type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}