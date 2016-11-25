<?php
include_once 'Artist.php';

class Event
{
    private $id;
    private $name;
    private $starttime;
    private $artist;

    /**
     * Event constructor.
     * @param $id
     * @param $name
     * @param $starttime
     * @param $artist
     */
    public function __construct($id, $name, $starttime, $artist)
    {
        $this->id = $id;
        $this->name = $name;
        $this->starttime = $starttime;
        $this->artist = $artist;
    }

    /**
     * @return
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * @param string $starttime
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;
    }

    /**
     * @return Artist
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param Artist $artist
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }


}