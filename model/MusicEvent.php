<?php

class MusicEvent extends Event {

    /**
     * The artist object
     * @var Artist 
     */
    private $artist;

    function __construct($id = 0) {
        parent::__construct($id);
    }

    public function getArtist() {
        return $this->artist;
    }

    public function setArtist(Artist $artist) {
        $this->artist = $artist;
    }

    public function __toString()
    {
        $string = 'Name: ' . parent::getName() . '\n';
        $string .= 'Starttime: ' . parent::getStarttime() - '\n';
        $string .= 'Id: ' . parent::getId()  . '\n';
        return $string;
    }

}

