<?php
include_once 'model/Event.php';
include_once 'model/MusicEvent.php';
include_once 'model/Artist.php';

class CSVAdapter
{
    private $csvFile;


    /**
     * CSVAdapter constructor.
     * @param $csvFile
     */
    public function __construct(string $csvFile)
    {
        $this -> csvFile = fopen($csvFile , "r");
    }

    /**
     * @return array
     */
    public function getEventList() : array
    {
        $eventList = array();
        while (!feof($this->csvFile)) {
            $eventInfos = fgetcsv($this->csvFile, ',');
            $artist = new Artist($eventInfos[1],$eventInfos[3], $eventInfos[5], $eventInfos[4]);
            $event = new MusicEvent($eventInfos[0], $eventInfos[1], $eventInfos[2], $artist);
            $eventList[] = $event;
        };
        return $eventList;
    }

    /**
     * @param int $eventID
     * @return Event
     */
    public function getEvent($eventID) : Event
    {
       $eventList = $this -> getEventList();
       foreach ($eventList as $event){
           if(($event -> getId()) == $eventID){
               return $event;
           }
       }
    }


}
