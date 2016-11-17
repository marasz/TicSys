<?php
include_once 'resources/eventlist.php';

/*foreach ($events as $key => $event){
        echo '<div id = "event">';
        echo '<H1>' . $event['title'] . '</H1>';
        echo '<H2>' . $event['date'] . '</H2>';
        echo '<p>' . $event['description'] . '</p>';
        echo '</div>';
};*/


$file = fopen("resources/eventlist.csv","r");

if(preg_match("/[0-9]+/", basename($_SERVER['REQUEST_URI']))){
    while(! feof($file)) {
        $data = fgetcsv($file, ',');
        if($data[0] == basename($_SERVER['REQUEST_URI'])){
            echo '<div id = "event">';
            echo <<<EOT
<img src="$data[5]"></img>
EOT;
            echo '<H1>' . $data[1] . '</H1>';
            echo '<H2>' . $data[2] . '</H2>';
            echo '<p>' . $data[3] . '</p>';
            echo '</div>';
        }
    };
} else {
    while (!feof($file)) {
        $data = fgetcsv($file, ',');
        echo '<a href="' . $_SERVER['REQUEST_URI'] . "/" . $data[0] . '">';
        echo '<div id = "event">';
        echo <<<EOT
    <img src="$data[4]"></img>
EOT;

        echo '<H1>' . $data[1] . '</H1>';
        echo '<H2>' . $data[2] . '</H2>';
        echo '<p>' . $data[3] . '</p>';
        echo '</div>';
        echo '</a>';
    };
}
