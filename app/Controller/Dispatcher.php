<?php

namespace Controller;

//Le dispatcher permet la création d'url propre

class Dispatcher
{
	public function dispatch($routes, $p)
	{

		//on instancie le controller
		$controller = new DefaultController();
		//une boucle foreach cherche la route dans le tableau
		foreach ($routes as $url => $method) {
			if ($url == $p) {
				//on appel la fonction défini dans le DefaultController
				return call_user_func([$controller, $method]);
			}
		}
		//si l'URL est non définit dans les routes error404
		return call_user_func([$controller, "error404"]);
	}
}