
<?php

if(empty($_POST)) {

  $respone['status'] = 'OK';
  echo json_encode($respone);

} else {

  $userData = json_decode($_POST['jsonData']);
  $key = randomString();

  include '/etc/php/vendor/autoload.php'; // include Composer's autoloader
  $client = new MongoDB\Client("mongodb://localhost:27017");
  $collection = $client->TicTacToe->users;
  //$result = $collection->insertOne( userData );
  $result = $collection->insertOne( [ 'username' => $userData -> username, 'email' => $userData -> email, 'password' => $userData -> password, 'verified' => FALSE, 'key' => $key ] );

  $to = $userData -> email;
  $subject = "Tic Tac Toe Account Verification";
  $message = "Key: " . $key . "\nhttp://130.245.171.78/verify/verify.php";
  // $from = "my_address@domain.com";
  // $headers = "From:" . $from;
  mail($to, $subject, $message);


  $respone['status'] = 'OK';
  $respone['userData'] = $userData;
  echo json_encode($respone);

}

function randomString() {
  $length = 10;
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}



 ?>
