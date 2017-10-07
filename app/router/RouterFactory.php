<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;


class RouterFactory
{

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
        $router = new RouteList;
        $router[] = new RestRoute('GET', '/api/v1/users', ['presenter' => 'Users', 'action' => 'listAll',]);
        $router[] = new RestRoute('POST', '/api/v1/users', ['presenter' => 'Users', 'action' => 'create',]);
        $router[] = new RestRoute('GET', '/api/v1/users/<id>', ['presenter' => 'Users', 'action' => 'list',]);
        $router[] = new RestRoute('PUT', '/api/v1/users/<id>', ['presenter' => 'Users', 'action' => 'modify',]);
        $router[] = new RestRoute('DELETE', '/api/v1/users/<id>', ['presenter' => 'Users', 'action' => 'delete',]);

//		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
        return $router;
	}

}
