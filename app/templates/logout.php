<?php

//efface la donnée qui permet d'identifier l'utilisateur
unset($_SESSION);
session_destroy();

//redirige vers menu
header("Location: ".BASE_URL);