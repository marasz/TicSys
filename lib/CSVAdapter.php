<?php

class CSVAdapter
{
    private $csvFile;


    public function __construct($csvFile)
    {
        $this->csvFile = $csvFile;
    }

    public function getEventList()
    {
        $eventList = array();
        while (!feof($this->csvFile)) {
            $eventList[] = fgetcsv($this->csvFile, ',');
        };
        return $eventList;
    }

    public function getEvent($eventID)

    {
        $eventlist = $this->getEventList();
        foreach ($eventlist as $event){
            if($event[0] == $eventID){
                return $event;
            }
        }
    }


}
