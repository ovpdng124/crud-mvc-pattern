<?php
require_once 'model/Model.php';
require_once 'controller/Controller.php';
$lifeTime = 30*24*3600;
session_set_cookie_params($lifeTime, '/');
session_start();
$controller = new Controller();
$controller->invoke();