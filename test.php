<?php
include_once 'lib/XMLAdapter.php';

$xmlAdapter = new XMLAdapter('resources/eventlist.xml');
$xmlAdapter->getEventList();