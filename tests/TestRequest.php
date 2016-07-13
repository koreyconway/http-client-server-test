<?php

require __DIR__ . '/../vendor/autoload.php';

use \pillr\library\http\Request      as Request;
use \pillr\library\http\Message      as Message;
use \pillr\library\http\Stream       as Stream;
use \pillr\library\http\Uri          as Uri;

class TestRequest extends \PHPUnit_Framework_TestCase {

    public function testGets()
    {
        $headers = array('Host' => 'billybob.com', 'Accept' => array('application/json', 'text/plain'));
        $body = new Stream('test message');
        $uri = new Uri('htTps://james:bond@pillrcompany.com:55/interns/test?psr=true#airfive');
        $req = new Request('1.1', 'GET', $uri, $headers, $body);

        // Note: adapted for absolute target to suit Pillr's test
        $this->assertEquals(
            'https://james:bond@pillrcompany.com:55/interns/test?psr=true#airfive',
            $req->getRequestTarget()
        );

        $this->assertEquals(
            'GET',
            $req->getMethod()
        );

        $this->assertEquals(
            $uri,
            $req->getUri()
        );
    }

    public function testWithCreations()
    {
        $headers = array('Host' => 'billybob.com', 'Accept' => array('application/json', 'text/plain'));
        $body = new Stream('test message');
        $uri = new Uri('htTps://james:bond@pillrcompany.com:55/interns/test?psr=true#airfive');
        $req = new Request('1.1', 'GET', $uri, $headers, $body);

        $uri = new Uri('http://batman.in');
        $req = $req->withUri($uri);

        $this->assertEquals(
            $uri,
            $req->getUri()
        );

        $this->assertEquals(
            array('batman.in'),
            $req->getHeader('host')
        );
    }

}
