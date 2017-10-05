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
        'GET' => 'List',
        'POST' => 'Create',
        'PUT' => 'Modify',
        'DELETE' => 'Delete',
    ];
    private $route;

    public function __construct($method, $mask, $presenter) {
        if(array_key_exists($method, self::$methodsMap)) {
            $methodsMap = self::$methodsMap[$method];
            $apiMeta = [
                'presenter' => $presenter,
                'action' => "action{$methodsMap}",
            ];
            $this->route = new Route($mask, $apiMeta);
        } else {
            throw new InvalidArgumentException("Method '{$method}' is not allowed.");
        }
    }

    /**
     * Maps HTTP request to a Request object.
     * @return AppRequest|NULL
     */
    function match(HttpRequest $httpRequest) {

        return $this->route->match($httpRequest);

    }

    /**
     * Constructs absolute URL from Request object.
     * @return string|NULL
     */
    function constructUrl(AppRequest $appRequest, Url $refUrl) {

        return $this->route->constructUrl($appRequest, $refUrl);

    }

}