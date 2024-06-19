// index.php
<?php
require 'vendor/autoload.php';

use MongoDB\Client;

$uri = "mongodb+srv://<username>:<password>@cluster0.mongodb.net/<dbname>?retryWrites=true&w=majority";
$client = new Client($uri);

$collection = $client->test->users;

$insertOneResult = $collection->insertOne([
    'name' => 'Alice',
    'age' => 29,
    'email' => 'alice@example.com'
]);

echo "Inserted with Object ID '{$insertOneResult->getInsertedId()}'";

$user = $collection->findOne(['name' => 'Alice']);
echo "User: " . $user['name'] . ", Age: " . $user['age'] . ", Email: " . $user['email'];
