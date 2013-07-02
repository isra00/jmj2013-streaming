<?php

/* Init */

define('ROOT', '/streaming-encontro');

header('X-UA-Compatible: IE=edge,chrome=1');

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'es';
$lang = in_array($lang, array('es', 'pt', 'en', 'it')) ? $lang : 'es';

include "lang-$lang.php";



include 'index.view.php';