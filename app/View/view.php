<?php

namespace View;

class View
{
	//creation d'une fonction static, pour l'appeler directement
	//elle recoit le nom de la page et le titre
	//pour rendre des variables disponible dans le vue on utilise un tableau
	public static function show($page, $title, array $vars = null)
	{
		//si on à des données supplémentaires
		if (!empty($vars)){
			//on extrait les donnée
			//les CLEFS du tableau servent ici fr nom aux variables créées
			extract($vars);
		}
		//permet de passer la page avec ou sans .php
		$page = str_replace(".php", "", $page);

		//base ce chargera d'inclure la page avec le titre dans le head
		include("app/templates/base.php");
	}
}