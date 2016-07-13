<?php

require __DIR__ . '/../vendor/autoload.php';

use \pillr\library\http\Request  as HttpRequest;
use \pillr\library\http\Response as HttpResponse;
use \pillr\library\http\Uri      as Uri;

class TestHttpServer extends \PHPUnit_Framework_TestCase {

    public function testRequest()
    {
        // *
 // * - Protocol version
 // * - HTTP method
 // * - URI
 // * - Headers
 // * - Message body

        $uri_string = 'https://pillrcompany.com/interns/test?psr=true';

        $httpRequest =  new HttpRequest(
            '1.1',
            'GET',
            new Uri($uri_string),
            array('Accept' => 'application/json'),
            ''
        );

        $this->assertEquals(
            $uri_string,
            $httpRequest->getRequestTarget()

        );

        $this->assertEquals(
            'GET',
            $httpRequest->getMethod()
        );

        $this->assertEquals(
            new Uri($uri_string),
            $httpRequest->getUri()
        );

        // Note: if the URI is being updated with the request than the host header must be updated
        $this->assertEquals(
            $httpRequest =  new HttpRequest(
                '1.1',
                'GET',
                new Uri('https://pillrcompany.com/intern/alt'),
                array('Accept' => 'application/json', 'Host' => 'pillrcompany.com'),
                ''
            ),
            $httpRequest->withRequestTarget('https://pillrcompany.com/intern/alt')
        );
    }

    public function testResponse()
    {

 // - Protocol version
 // * - Status code and reason phrase
 // * - Headers
 // * - Message body

        $httpResponse =  new HttpResponse(
            '1.1',
            '200',
            'OK',
            array('Content-Type' => 'application/json'),
            'hello'
        );

        $httpResponseAlt =  new HttpResponse(
            '1.1',
            '404',
            'Not Found',
            array('Content-Type' => 'application/json'),
            'hello'
        );

        $this->assertEquals('200', $httpResponse->getStatusCode());

        $this->assertEquals(
            $httpResponseAlt,
            $httpResponse->withStatus('404', 'Not Found')
        );
    }
}
