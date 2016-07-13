<?php

require __DIR__ . '/../vendor/autoload.php';

use \pillr\library\http\Uri      as Uri;

class TestUri extends \PHPUnit_Framework_TestCase {

    public function testGets()
    {
        $uri_string = 'htTps://james:bond@pillrcompany.com:55/interns/test?psr=true#airfive';
        $uri =  new Uri($uri_string);

        $this->assertEquals(
            'https',
            $uri->getScheme()
        );

        $this->assertEquals(
            'james:bond@pillrcompany.com:55',
            $uri->getAuthority()
        );

        $this->assertEquals(
            'james:bond',
            $uri->getUserInfo()
        );

        $this->assertEquals(
            'pillrcompany.com',
            $uri->getHost()
        );

        $this->assertEquals(
            '55',
            $uri->getPort()
        );

        $this->assertEquals(
            '/interns/test',
            $uri->getPath()
        );

        $this->assertEquals(
            'psr=true',
            $uri->getQuery()
        );

        $this->assertEquals(
            'airfive',
            $uri->getFragment()
        );

        $uri_string = 'https://pillrcompany.com';
        $uri =  new Uri($uri_string);

        $this->assertEquals(
            '',
            $uri->getPath()
        );

    }

    public function testWithCreations()
    {
        $uri_string = 'htTps://james:bond@pillrcompany.com:55/interns/test?psr=true#airfive';
        $uri =  new Uri($uri_string);

        $this->assertEquals(
            'http',
            $uri->withScheme('Http')->getScheme()
        );

        $this->assertEquals(
            'bond:james',
            $uri->withUserInfo('bond:james')->getUserInfo()
        );

        $this->assertEquals(
            'jamesbond.com',
            $uri->withHost('jamesbond.com')->getHost()
        );

        $this->assertEquals(
            '45',
            $uri->withPort('45')->getPort()
        );

        $this->assertEquals(
            '/abc/alphabet',
            $uri->withPath('abc/alphabet')->getPath()
        );

        $this->assertEquals(
            'james=bond',
            $uri->withQuery('james=bond')->getQuery()
        );

        $this->assertEquals(
            'fatchance',
            $uri->withFragment('fatchance')->getFragment()
        );
    }

    public function testToString()
    {
        $uri_string = 'htTps://james:bond@pillrcompany.com:55/interns/test?psr=true#airfive';
        $uri =  new Uri($uri_string);
        $uri = $uri->withHost('jamesbond.com');

        $this->assertEquals(
            'https://james:bond@jamesbond.com:55/interns/test?psr=true#airfive',
            (string)$uri
        );
    }

}
