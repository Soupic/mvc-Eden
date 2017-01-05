<?php

namespace Model\Entity;

class Images
{
	private $id;
	private $name;
	private $type;
	private $id_news;
	private $id_caraters;

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

    /**
     * Gets the value of id_news.
     *
     * @return mixed
     */
    public function getIdNews()
    {
        return $this->id_news;
    }

    /**
     * Sets the value of id_news.
     *
     * @param mixed $id_news the id news
     *
     * @return self
     */
    public function setIdNews($id_news)
    {
        $this->id_news = $id_news;
    }

    /**
     * Gets the value of id_caraters.
     *
     * @return mixed
     */
    public function getIdCaraters()
    {
        return $this->id_caraters;
    }

    /**
     * Sets the value of id_caraters.
     *
     * @param mixed $id_caraters the id caraters
     *
     * @return self
     */
    public function setIdCaraters($id_caraters)
    {
        $this->id_caraters = $id_caraters;
    }
}