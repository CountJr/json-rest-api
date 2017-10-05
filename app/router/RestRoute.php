<?php

namespace App;

use Nette\Application\IRouter;
use Nette\Application\Request as AppRequest;
use Nette\Http\IRequest as HttpRequest;
use Nette\Http\Url;
use Nette\Application\Routers\Route;
use Nette\InvalidArgumentException;


class RestRoute implements IRouter
{
    private static $methodsMap = [
        'GET' => 'list',
        'POST' => 'create',
        'PUT' => 'modify',
        'DELETE' => 'delete',
    ];
    private $route;

    public function __construct($mask, $presenter) {
        $this->route = new Route($mask, ['presenter' => $presenter]);
    }

    /**
     * Maps HTTP request to a Request object.
     * @param HttpRequest $httpRequest
     * @return AppRequest|NULL
     */
    function match(HttpRequest $httpRequest) {

        $match = $this->route->match($httpRequest);

        if(array_key_exists($match->getMethod(), self::$methodsMap)) {
            $match->setParameters(array_merge($match->getParameters(), ['action' => self::$methodsMap[$match->getMethod()]]));
            return $match;
        } else {
            throw new InvalidArgumentException("Method '{$match->getMethod()}' is not allowed.");
        }

    }

    /**
     * Constructs absolute URL from Request object.
     * @param AppRequest $appRequest
     * @param Url $refUrl
     * @return string|NULL
     */
    function constructUrl(AppRequest $appRequest, Url $refUrl) {

        return $this->route->constructUrl($appRequest, $refUrl);

    }

}