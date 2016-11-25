<?php

class Artist
{
    private $name;
    private $descrition;
    private $picture;
    private $tumbnail;
    private $videos;

    /**
     * Artist constructor.
     * @param string $name
     * @param string $descrition
     * @param string $picture
     * @param string $tumbnail
     */
    public function __construct($name, $descrition, $picture, $tumbnail)
    {
        $this->name = $name;
        $this->descrition = $descrition;
        $this->picture = $picture;
        $this->tumbnail = $tumbnail;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->descrition;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @return string
     */
    public function getTumbnail()
    {
        return $this->tumbnail;
    }




}