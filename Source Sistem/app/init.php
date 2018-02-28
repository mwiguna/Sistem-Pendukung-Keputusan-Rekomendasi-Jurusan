<?php

session_start();

spl_autoload_register(function($class){ 
  require_once 'Core/'.$class.'.php';
});

$urlStart          = strlen($_SERVER['DOCUMENT_ROOT']);
$GLOBALS['home']   = substr(__DIR__.'/../', $urlStart);
$GLOBALS['assets'] = $GLOBALS['home'].'resource/assets';

require_once "Routes.php";