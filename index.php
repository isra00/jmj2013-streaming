<?php

/* Init */

define('ROOT', '/streaming-encontro');

header('X-UA-Compatible: IE=edge,chrome=1');

$languages = array(
	'es' => array(
		'name'	=> 'Castellano',
		'url'	=> '/streaming-encontro/encuentro-vocacional-jovenes-camino-neocatecumenal',
	),
	'pt' => array(
		'name'	=> 'Português',
		'url'	=> '/streaming-encontro/encontro-vocacional-jovens-caminho-neocatecumenal'
	),
	'it' => array(
		'name'	=> 'Italiano',
		'url'	=> '/'
	),
	'en' => array(
		'name'	=> 'English',
		'url'	=> '/'
	),
);

$current_lang = isset($_GET['lang']) ? $_GET['lang'] : 'es';
$current_lang = in_array($current_lang, array_keys($languages)) ? $current_lang : 'es';

include "lang-$current_lang.php";


/* Prepare view */


include 'index.view.php';