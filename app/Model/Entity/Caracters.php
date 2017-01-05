<?php

namespace Model\Entity;

class Caracters
{
	private $id;
	private $name;
	private $resume;



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
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Gets the value of resume.
     *
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Sets the value of resume.
     *
     * @param mixed $resume the resume
     *
     * @return self
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    }
}