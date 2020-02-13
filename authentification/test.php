<?php

require_once './../../config.php';
require './Authentification.php';

echo Authentification::nouveauUtilisateur("Clément", "testest","testest","test@test.com");