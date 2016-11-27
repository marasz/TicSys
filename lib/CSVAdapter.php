<?php
include_once 'model/Event.php';
include_once 'model/Artist.php';

class CSVAdapter
{
    private $csvFile;


    /**
     * CSVAdapter constructor.
     * @param $csvFile
     */
    public function __construct($csvFile)
    {
        $this -> csvFile = fopen($csvFile , "r");
    }

    /**
     * @return array
     */
    public function getEventList()
    {
        $eventList = array();
        while (!feof($this->csvFile)) {
            $eventInfos = fgetcsv($this->csvFile, ',');
            $artist = new Artist($eventInfos[1],$eventInfos[3], $eventInfos[5], $eventInfos[4]);
            $event = new Event($eventInfos[0], $eventInfos[1], $eventInfos[2], $artist);
            $eventList[] = $event;
        };
        return $eventList;
    }

    /**
     * @param int $eventID
     * @return Event
     */
    public function getEvent($eventID)
    {
       $eventList = $this -> getEventList();
       foreach ($eventList as $event){
           if(($event -> getId()) == $eventID){
               return $event;
           }
       }
    }


}
