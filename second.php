<?php

require_once __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client)->itech_lab2->Report; 
if (isset($_GET["ch"])) {
    $ch = $_GET["ch"];
    $res = '';
    $cursor = $collection->aggregate(
        [
            [ '$match' => ['chief' => $ch] ],
            [ '$group' => ['_id' => '$project'] ],
            [ '$count' => 'count']

        ]
    );
    foreach ($cursor as $document) {
        print_r($document{'count'}); echo '<br>';
    }
    
}

?>