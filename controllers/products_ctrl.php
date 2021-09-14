<?php

session_start();

require_once(dirname(__FILE__).'/../models/products.php');






include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/products-recipes/products.php');

include(dirname(__FILE__).'/../views/templates/footer.php');