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
    public function __construct(int $id,string $name,string $starttime,Artist $artist)
    {
        $this->id = $id;
        $this->name = $name;
        $this->starttime = $starttime;
        $this->artist = $artist;
    }

    /**
     * @return
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getStarttime() : string
    {
        return $this->starttime;
    }

    /**
     * @param string $starttime
     */
    public function setStarttime(string $starttime)
    {
        $this->starttime = $starttime;
    }

    /**
     * @return Artist
     */
    public function getArtist() : Artist
    {
        return $this->artist;
    }

    /**
     * @param Artist $artist
     */
    public function setArtist(Artist $artist)
    {
        $this->artist = $artist;
    }


}