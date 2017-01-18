<?php

include_once 'lib/CSVAdapter.php';
include_once 'lib/XMLAdapter.php';
include_once 'controller/Controller.php';
include_once 'model/Event.php';
include_once 'model/MusicEvent.php';
include_once 'model/Artist.php';
include_once 'view/View.php';
include_once 'view/event/EventListView.php';
include_once 'view/event/EventDetailView.php';

class EventController extends Controller {

    private $XMLAdapter;

    function __construct() {
        $this->XMLAdapter = new XMLAdapter('resources/eventlist.xml');
    }

    protected function index() {
        $eventList = $this->XMLAdapter->getEventList();
        $view = new EventListView();
        $view->assign('list', $eventList);
        $view->display();
    }

    protected function show() {
        $event = $this->XMLAdapter->getEvent($this->resourceId);
        if (!empty($event)) { // Event with transmitted ID was found
            $view = new EventDetailView();
            $view->assign('event', $event);
            $view->display();
        }
    }

    protected function init() {
        echo "not implemented";
    }

    protected function create() {
        echo "not implemented";
    }

}

