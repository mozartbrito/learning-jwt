<?php 

function token() {
	$key = 'qualquer-coisa';

	$header = [
		'typ' => 'JWT',
		'alg' => 'HS256'
	];

	$header = json_encode($header);
	$header = base64_encode($header);


	$payload = [
		'iss' => 'mozartbrito.com.br',
		'username' => 'mozartbrito',
		'email' => 'mozart.contato@gmail.com'
	];

	$payload = json_encode($payload);
	$payload = base64_encode($payload);

	//print_r($payload);

	$signature = hash_hmac('sha256', "$header.$payload", $key, true);

	$signature = base64_encode($signature);

	$token = "$header.$payload.$signature";

	return $token;
}

//echo token(); exit;

$received_token = 'reyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJtb3phcnRicml0by5jb20uYnIiLCJ1c2VybmFtZSI6Im1vemFydGJyaXRvIiwiZW1haWwiOiJtb3phcnQuY29udGF0b0BnbWFpbC5jb20ifQ==.+rqvZGdvQZiGUsJVjzKtq95uAefEFXTbbdUohSgYMvQ=';

if($received_token === token())
{
	echo 'Siga em frente';
} else {
	echo 'Saia daqui';
}

?>