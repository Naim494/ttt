<?php

require '/Applications/XAMPP/xamppfiles/vendor/autoload.php'; // include Composer's autoloader
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->testdb->movie;
$result = $collection->insertOne( [ 'name' => 'Cat'] );
echo "Inserted with Object ID '{$result->getInsertedId()}'";

?>
