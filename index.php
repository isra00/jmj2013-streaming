<?php

/* 
 * Init 
 */

date_default_timezone_set('America/Sao_Paulo');

define('ROOT', 			'/streaming-encontro');
define('CACHE_TTL',		60 * 2); //2 minutes
define('CACHE_KEY',		'jmj2013-config'); //2 minutes

define('MEETING_START',	strtotime('2013-07-29 14:00:00'));
define('MEETING_END',	strtotime('2013-07-29 20:00:00'));

define('URL_SELF',		'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

/*
 * Load config 
 */

if (!$config = apc_fetch(CACHE_KEY))
{
	$default_config = array(
		'general_disable'			=> false,
		'force_meeting_finished'	=> false,
	);
	$config = json_decode(file_get_contents('config.json'), true);
	$config = array_merge($default_config, $config); //Override default configs	

	apc_store(CACHE_KEY, $config, CACHE_TTL);
}


/* 
 * Prepare view 
 */

$languages = array(
	'es' => array(
		'name'	=> 'Castellano',
		'code'	=> 'es_ES',
		'url'	=> '/encuentro-vocacional-jovenes-camino-neocatecumenal',
	),
	/*'pt' => array(
		'name'	=> 'Português',
		'code'	=> 'pt_BR',
		'url'	=> '/streaming-encontro/encontro-vocacional-jovens-caminho-neocatecumenal'
	),*/
	'it' => array(
		'name'	=> 'Italiano',
		'code'	=> 'it_IT',
		'url'	=> '/'
	),
	'en' => array(
		'name'	=> 'English',
		'code'	=> 'en_US',
		'url'	=> '/youth-vocational-meeting-neocatechumenal-way'
	),
);

$current_lang = isset($_GET['lang']) ? $_GET['lang'] : 'es';
$current_lang = in_array($current_lang, array_keys($languages)) ? $current_lang : 'es';

//EN is the default language and acts as fallback
include_once "lang-en.php";
include_once "lang-$current_lang.php";

header('X-UA-Compatible: IE=edge,chrome=1');
header("Content-Language: $current_lang");

$show = array(
	'player' 		=> !$config['general_disable'] && !$config['force_meeting_finished'],
	'not_yet'		=> time() < MEETING_START,
	'finished'		=> time() > MEETING_END,
);

$show['streaming_now'] = time() > MEETING_START && time() < MEETING_END && $show['player'];

include 'index.view.php';