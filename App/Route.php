<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['bosses'] = array(
			'route' => '/bosses',
			'controller' => 'appController',
			'action' => 'bosses'
		);

		$this->setRoutes($routes);
	}

}

?>