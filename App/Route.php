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

		$routes['infusions'] = array(
			'route' => '/infusions',
			'controller' => 'appController',
			'action' => 'infusions'
		);

		$routes['sorceries'] = array(
			'route' => '/sorceries',
			'controller' => 'appController',
			'action' => 'sorceries'
		);

		$routes['pyromancies'] = array(
			'route' => '/pyromancies',
			'controller' => 'appController',
			'action' => 'pyromancies'
		);

		$this->setRoutes($routes);
	}

}

?>