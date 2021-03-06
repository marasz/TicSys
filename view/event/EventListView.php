<?php

class EventListView extends View {

    public function display() {
        echo "<h1>Alle Events</h1>";
        foreach ($this->list as $event) {
            $date = new DateTime($event->getStarttime());
            $date->setTimezone(new DateTimeZone('Europe/Zurich'));
            $startTime = $date->format('d.m.Y H:i');

            $url = URI_EVENTS . "/{$event->getId()}-" . Controller::encodeUrl("{$event->getName()}-{$startTime}");
            $artist = $event->getArtist();
            echo <<<EVENT
        
            <div class="event-info list">
                <div class="order"><a href="$url#order">Jetzt bestellen</a></div>
                <a href="$url">
                    <h2>{$event->getName()}</h2>
                    <h3>{$startTime}</h3>
                    <p><img src="/resources/{$artist->getImageThumb()}" alt="{$artist->getName()}" />{$artist->getDescription()}</p>
                    <div class="clear"></div>
                </a>
            </div>
EVENT;
        }
    }

}

