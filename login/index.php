<?php
if(empty($_POST)) {

    $respone['status'] = 'OK';
    echo json_encode($respone);

} else {

  $userData = json_decode($_POST['jsonData']);

  include '/etc/php/vendor/autoload.php'; // include Composer's autoloader
  $client = new MongoDB\Client("mongodb://localhost:27017");
  $collection = $client->TicTacToe->users;

  $isVerified = $collection->findOne(['username' => $userData -> username]) -> verified;
  $username = $collection->findOne(['username' => $userData -> username]) -> username;
  $password = $collection->findOne(['username' => $userData -> username]) -> password;

  //$respone['userData'] = $userData;
  //$respone['verified'] = $isVerified;

  if($username == $userData -> username && $password == $userData -> password && $isVerified) {
    $respone['status'] = 'OK';
    echo json_encode($respone);
  }
  else {
    $respone['status'] = 'ERROR';
    echo json_encode($respone);
  }

}



?>
