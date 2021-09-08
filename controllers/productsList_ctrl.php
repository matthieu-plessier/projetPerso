<?php

require_once(dirname(__FILE__).'/../models/products.php');


$products = Product::findAll();



include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/products-recipes/productList.php');

include(dirname(__FILE__).'/../views/templates/footer.php');