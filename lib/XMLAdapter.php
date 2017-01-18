<?php

class XMLAdapter {

    /**
     * The absolute path of the csv file
     * @var string 
     */
    private $filePath;

    /**
     * @param string $filePath 
     */
    function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function getFilePath() {
        return $this->filePath;
    }

    /**
     * Returns the event by given id if present, null otherwise
     * @param int $id
     * @return Event 
     */
    public function getEvent($id) {
        $list = $this->getEventList();
        if (!empty($list) && array_key_exists($id, $list)) {
            return $list[$id];
        }
        return null;
    }

    /**
     * @return array list of all events in csv file 
     */
    public function getEventList()
    {
        $list = array();
        /*
         * event csv structure
         * ---------------
         * 0 => ID
         * 1 => Title
         * 2 => Start Unix Timestamp
         * 3 => Image
         * 4 => Image Thumbnail
         * 5 => Description
         */

        $xml = simplexml_load_file($this->filePath);

        $list = array();
        foreach ($xml->event as $id => $event) {
            $id = $event->attributes()->id;
            $id = $id[0];
            var_dump($id[0]);
            $musicEvent = new MusicEvent($id);
            $artist = new Artist($event->artist, $event->picture,$event->tumbnail,$event->description);
            $musicEvent->setArtist($artist);
            $musicEvent->setName($event->artist);
            $musicEvent->setStarttime($event->timestamp);

            $list[$id] = $musicEvent;
        }
        return $list;
    }

}

