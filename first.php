<?php

require_once __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client)->itech_lab2->Report; 
if (isset($_GET["chief"])) {
    $chief = $_GET["chief"];

    $cursor = $collection->find(
        [
            'chief' => $chief
        ],
        [
            'projection' => ['_id' => 0, 'worker' => 1]
        ]
    
    );
    foreach ($cursor as $document) {
        print_r($document{'worker'}); echo '<br>';
    }
    
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html> -->