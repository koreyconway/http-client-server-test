<?php
require __DIR__ . '/../vendor/autoload.php';

// Note: Code is contrived to conform to Pillr's requirements to use implemented classes where possible

use pillr\library\http\Request as Request;
use pillr\library\http\Response as Response;
use pillr\library\http\Uri as Uri;

$protocol = $_SERVER['SERVER_PROTOCOL'];
$protocolVersion = substr($protocol, strpos($protocol, "/") + 1);
$protocol = strtolower(substr($protocol, 0, strpos($protocol, "/")));
$uri = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$headers = getallheaders() ?? array();

$request = new Request($protocolVersion, $_SERVER['REQUEST_METHOD'], new Uri($uri), $headers, file_get_contents("php://input"));

$lastChange = filemtime(__FILE__);

$headers = array(
	'Date' => date('D, d M Y H:i:s T'),
	'Server' => $_SERVER['SERVER_NAME'],
	'Last-Modified' => date('D, d M Y H:i:s T', $lastChange),
	'Content-Type' => 'application/json'
);

$body = '{
    "@id": "'. $request->getUri() .'",
    "to": "Pillr",
    "subject": "Hello Pillr",
    "message": "Here is my submission.",
    "from": "Korey Conway",
    "timeSent": "' . date('D, d M Y H:i:s T') . '"
}';

$response = new Response('1.1', 200, '', $headers, $body);

$response->send();
