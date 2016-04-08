# http-client-server-test
A small test which challenges our intern candidates to set-up a basic php environment, 
implement PSR-7 Interfaces and pass the unit tests. The master code will contain enough to get you started.

PSR-7 "describes common interfaces for representing HTTP messages as described in [RFC   7230](http://tools.ietf.org/html/rfc7230) and [RFC 7231](http://tools.ietf.org/html/rfc7230), and URIs for use with HTTP messages as described in [RFC 3986](http://tools.ietf.org/html/rfc3986)." See [PSR-7: HTTP message interfaces - PHP-FIG](http://www.php-fig.org/psr/psr-7/)


###Requirements
1. Branch this project (name it with ```'<your name>-submission'```).
1. Ready the project locally as a web service. This means, the index.php script can be requested via HTTP. At Pillr, we use NGINX w/ PHP-FPM. However, PHP has it's [own web server](http://php.net/manual/en/features.commandline.webserver.php); which could be used as well as Apache w/ mod-php. However you prefer you local setup is up to you - take note that the HTTP headers should reflect your HTTP server choice.
1. Pass the [PHP-UNIT](https://phpunit.de/) tests in the tests folder.
1. index.php - 1-page app root scripts. When a Client (ex. web browser or curl) makes a HTTP Request to ``` <HOST-NAME>/index.php ```, your Server will provide a HTTP Response of:
```
HTTP/1.1 200 OK
Date: <NOW-DATE-TIME-STRING>
Server: <SERVER-PROVIDING-THE-RESPONSE>
Last-Modified: <LAST-TIME-CONTENT-MODIFIED-DATE-TIME-STRING>
Content-Length: <MESSAGE-BODY-STRING-LENGTH>
Content-Type: application/json
{
    "to": "Pillr",
    "subject": "Hello Pillr",
    "message": "Here is my submission.",
    "from": "<YOUR-NAME>",
    "timeSent": "<TIMESTAMP>"
}
```
Note: tagged strings like ```"<TAG-HERE>"``` are variables placeholders for values you provide.

Tip: 'Date' and 'Last-Modified' use the date format string is 'D, d M Y H:i:s T'.

We don't discourage any approach to this problem. For example, one can show efficiency and decisiveness in doing the bare minimum
to accomplish the Requirements; In contrast, one could decide to show that they are capable of going beyond the mean and delivering
a more robust solution. There is an exemplary example in many approaches. 


####Install PHPUnit on your system to complement your php command-line utilities
See: [Installing PHPUnit](https://phpunit.de/manual/current/en/installation.html)

####OR

####Install PHPUnit only for this project via Composer
Install packages via [Composer](https://getcomposer.org/doc/00-intro.md).

Add "phpunit/phpunit": "5.3.*" to the "require-dev" property
```
{
 ...
    "require-dev": {
        ...
        "phpunit/phpunit": "5.3.*"
        ...
    }
  ...
}
```


###Reference Material
- [HTTP](https://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol)
- [RFC 3986](http://tools.ietf.org/html/rfc3986)
- [RFC 7231](http://tools.ietf.org/html/rfc7230)
- [RFC 7230](http://tools.ietf.org/html/rfc7230)
- [JSON](https://en.wikipedia.org/wiki/JSON)
- [URI](https://en.wikipedia.org/wiki/Uniform_Resource_Identifier)
- [PSR-7: HTTP message interfaces - PHP-FIG](http://www.php-fig.org/psr/psr-7/)
