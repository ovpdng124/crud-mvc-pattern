<?php


class Book
{
    private $id, $name, $author, $publishingYear, $production, $image;
    public function __construct($id, $name, $author, $publishingYear, $production, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->publishingYear = $publishingYear;
        $this->production = $production;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getPublishingYear()
    {
        return $this->publishingYear;
    }

    /**
     * @param mixed $publishingYear
     */
    public function setPublishingYear($publishingYear)
    {
        $this->publishingYear = $publishingYear;
    }

    /**
     * @return mixed
     */
    public function getProduction()
    {
        return $this->production;
    }

    /**
     * @param mixed $production
     */
    public function setProduction($production)
    {
        $this->production = $production;
    }

}