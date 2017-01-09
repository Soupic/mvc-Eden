<?php

//efface la donnée qui permet d'identifier l'utilisateur
unset($_SESSION['user']);
session_destroy();

//redirige vers menu
header("Location: ".BASE_URL);