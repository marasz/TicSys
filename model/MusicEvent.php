<?php

/**
 * Created by PhpStorm.
 * User: Mauro
 * Date: 06.12.16
 * Time: 16:20
 */
class MusicEvent extends Event
{
    private $artist;

    public function __construct(int $id,string $name,string $starttime, $artist)
    {
        parent::__construct($id,$name,$starttime);
        $this->artist = $artist;
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