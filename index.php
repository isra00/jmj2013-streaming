<?php

/* Init */

define('ROOT', '/streaming-encontro');
date_default_timezone_set('America/Sao_Paulo');

header('X-UA-Compatible: IE=edge,chrome=1');

$languages = array(
	'es' => array(
		'name'	=> 'Castellano',
		'url'	=> '/encuentro-vocacional-jovenes-camino-neocatecumenal',
	),
	/*'pt' => array(
		'name'	=> 'Português',
		'url'	=> '/streaming-encontro/encontro-vocacional-jovens-caminho-neocatecumenal'
	),*/
	'it' => array(
		'name'	=> 'Italiano',
		'url'	=> '/'
	),
	'en' => array(
		'name'	=> 'English',
		'url'	=> '/youth-vocational-meeting-neocatechumenal-way'
	),
);

$current_lang = isset($_GET['lang']) ? $_GET['lang'] : 'es';
$current_lang = in_array($current_lang, array_keys($languages)) ? $current_lang : 'es';

//EN is the default language and acts as fallback
include_once "lang-en.php";
include_once "lang-$current_lang.php";


/* Prepare view */

include 'index.view.php';