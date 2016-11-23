<?php
include_once 'lib/CSVAdapter.php';


$csvAdater = new CSVAdapter(fopen("resources/eventlist.csv", "r"));

if (preg_match("/[0-9]+/", basename($_SERVER['REQUEST_URI']), $matches)) {
        $file = $csvAdater ->getEventList();
        $data = fgetcsv($file, ',');
        if ($data[0] == $matches[0]) {
            echo '<div id = "event">';
            echo <<<EOT
<img src="$data[5]"></img>
EOT;
            echo '<p>';
            echo '<H1>' . $data[1] . '</H1>';
            echo '<H2>' . $data[2] . '</H2>';
            echo '<p>' . $data[3] . '</p>';
            echo '</div>';
            echo '</p>';
        }
} else {
    while (!feof($file)) {
        $data = fgetcsv($file, ',');
        echo '<a href="' . $_SERVER['REQUEST_URI'] . "/" . $data[0] . '">';
        echo '<div id = "event">';
        echo '<H1>' . $data[1] . '</H1>';
        echo '<H2>' . $data[2] . '</H2>';
        echo <<<EOT
    <img src="$data[4]"></img>
EOT;
        echo '<p>' . $data[3] . '</p>';
        echo '</div>';
        echo '</a>';
    };
}
