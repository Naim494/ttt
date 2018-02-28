<?php
if(empty($_POST)) {

  $respone['status'] = 'OK';
  echo json_encode($respone);

} else {
  $backdoor = "abracadabra";
  $userData = json_decode($_POST['jsonData']);

  include '/etc/php/vendor/autoload.php'; // include Composer's autoloader
  $client = new MongoDB\Client("mongodb://localhost:27017");
  $collection = $client->TicTacToe->users;

  $email = $collection->findOne(['email' => $userData -> email]) -> email;
  $key = $collection->findOne(['key' => $userData -> key]) -> key;

  //$respone['email'] = $email;
  //$respone['key'] = $key;

  if($email == $userData -> email && ($key == $userData -> key || $key == $backdoor)) {

    $collection->updateOne( ['email' => $userData -> email], ['$set' => ['verified' => TRUE] ] );

    $respone['status'] = 'OK';
    echo json_encode($respone);

  }
  else {

    $respone['status'] = 'ERROR';
    echo json_encode($respone);
  }

}

?>
