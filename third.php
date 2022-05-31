<?php

require_once __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client)->itech_lab2->Report; 
if (isset($_GET["date"]) && isset($_GET["project"])) {
    $date = $_GET["date"];
    $UTCdate = strtotime($date, $baseTimestamp = null);
    $project = $_GET["project"];

    $cursor = $collection->find(
        [
            'project' => $project,
            'endTime' => [ '$lte' => $UTCdate ]
        ],
        [
            'projection' => ['_id' => 0, 'name' => 1, 'description' => 1]
        ]
    
    );
    foreach ($cursor as $document) {
        echo $document['name'].' --> '.$document['description'].'<br>';
    }
    
}

?>