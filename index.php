<?php

/* 
 * Init 
 */

date_default_timezone_set('America/Sao_Paulo');
define('ROOT', '/streaming-encontro');
define('MEETING_START', strtotime('2013-07-29 14:00:00'));
define('MEETING_END', strtotime('2013-07-29 20:00:00'));

/*
 * Load config 
 */

$default_config = array(
	'general_disable'			=> false,
	'force_meeting_finished'	=> false,
);
$config = json_decode(file_get_contents('config.json'), true);
$config = array_merge($default_config, $config); //Override default configs

/* 
 * Prepare view 
 */

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

header('X-UA-Compatible: IE=edge,chrome=1');

$show = array(
	'player' 		=> !$config['general_disable'] && !$config['force_meeting_finished'],
	'not_yet'		=> time() < MEETING_START,
	'finished'		=> time() > MEETING_END,
);

$show['streaming_now'] = time() > MEETING_START && time() < MEETING_END && $show['player'];

include 'index.view.php';