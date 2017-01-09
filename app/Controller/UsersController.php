<?php

namespace Controller;

class UersController
{
	//Vérification si longueur et format correct du pseudo
	public function formatPseudo($pseudo)
	{
		//on créer un tableau d'erreur
		$errors = [];
		//on créer un boolean pour validé le pseudo
		$boolPseudo = false;
		//on créer un tableau de valeur interdites
		$exclusions = ["admin", "administrateur", "administrator"];
		//on vérifie la longueur du pseudo
		if(strlen($pseudo) > 20){
			$errors[] = "User Name trop long, doit contenir moins de 20 caractères";
			$boolPseudo = false;
		}
		else{
			foreach ($exclusions as $value) {
				if($pseudo == $value){
					$errors[] = "User Name réservé";
					$boolPseudo = false;
				}
				else
				{
					$boolPseudo = true;
				}
			}
		}
		return $boolPseudo;
		
	}
}