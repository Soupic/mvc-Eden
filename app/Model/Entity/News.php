<?php

namespace Model\Entity;

class News
{
	private $id;
	private $date_post;
	private $title;
	private $content;
	private $link;
    private $id_users;



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
     * Gets the value of date_post.
     *
     * @return mixed
     */
    public function getDatePost()
    {
        return $this->date_post;
    }

    /**
     * Sets the value of date_post.
     *
     * @param mixed $date_post the date post
     *
     * @return self
     */
    public function setDatePost($date_post)
    {
        $this->date_post = $date_post;
    }


    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param mixed $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Gets the value of centent.
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the value of centent.
     *
     * @param mixed $centent the centent
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Gets the value of link.
     *
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the value of link.
     *
     * @param mixed $link the link
     *
     * @return self
     */
    public function setLink($link)
    {
        $this->link = $link;
    }


    /**
     * Gets the value of id_users.
     *
     * @return mixed
     */
    public function getIdUsers()
    {
        return $this->id_users;
    }

    /**
     * Sets the value of id_users.
     *
     * @param mixed $id_users the id users
     *
     * @return self
     */
    public function setIdUsers($id_users)
    {
        $this->id_users = $id_users;
    }
}