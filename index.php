<?php

$link = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
define('URL', 
	str_replace(  "index.php", 
		          "", 
		          (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$link.""
		       )
    );

require('controllers/Router.php');

$router = new Router();
$router->routeReq();