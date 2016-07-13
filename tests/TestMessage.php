<?php

require __DIR__ . '/../vendor/autoload.php';

use \pillr\library\http\Message      as Message;
use \pillr\library\http\Stream       as Stream;

class TestMessage extends \PHPUnit_Framework_TestCase {

    public function testGets()
    {
        $headers = array('Host' => 'billybob.com', 'Accept' => array('application/json', 'text/plain'));
        $body = new Stream('test message');
        $msg = new Message('1.1', $headers, $body);

        $this->assertEquals(
            '1.1',
            $msg->getProtocolVersion()
        );

        $this->assertEquals(
            array('Host' => array('billybob.com'), 'Accept' => array('application/json', 'text/plain')),
            $msg->getHeaders()
        );

        $this->assertEquals(
            false,
            $msg->hasHeader('Fail')
        );

        // With same case
        $this->assertEquals(
            true,
            $msg->hasHeader('AccepT')
        );

        // With different case
        $this->assertEquals(
            true,
            $msg->hasHeader('host')
        );

        $this->assertEquals(
            array(),
            $msg->getHeader('NotThere')
        );

        $this->assertEquals(
            array('billybob.com'),
            $msg->getHeader('hOst')
        );

        $this->assertEquals(
            'application/json, text/plain',
            $msg->getHeaderLine('aCcepT')
        );

        $this->assertEquals(
            'test message',
            (string)($msg->getBody())
        );
    }

    public function testWithCreations()
    {
        $headers = array('Host' => 'billybob.com', 'Accept' => array('application/json', 'text/plain'));
        $body = new Stream('test message');
        $msg = new Message('1.1', $headers, $body);

        // $this->assertEquals(
        //     'http',
        //     $msg->withHeader('Http')->getHeader()
        // );

    }

}
