<?php

namespace App;

use Nette\Application\IRouter;
use Nette\Application\Request as AppRequest;
use Nette\Http\IRequest as HttpRequest;
use Nette\Http\Url;
use Nette\Application\Routers\Route;

class RestRoute implements IRouter
{
    private $route;
    private $method;

    public function __construct($method, $mask, $metadata = [])
    {
        $this->route = new Route($mask, $metadata);
        $this->method = $method;
    }

    /**
     * Maps HTTP request to a Request object.
     * @param HttpRequest $httpRequest
     * @return AppRequest|NULL
     */
    public function match(HttpRequest $httpRequest)
    {

        $match = $this->route->match($httpRequest);

        if ($match && $match->getMethod() === $this->method) {
            return $match;
        }
        return null;
    }

    /**
     * Constructs absolute URL from Request object.
     * @param AppRequest $appRequest
     * @param Url $refUrl
     * @return string|NULL
     */
    public function constructUrl(AppRequest $appRequest, Url $refUrl)
    {

        return $this->route->constructUrl($appRequest, $refUrl);
    }
}
