<?php

define('CONFIG_FILE', 'config.json');
define('CACHE_KEY',	'jmj2013-config');

function generate_input($name, $value, $type)
{
	$output = "<input name='$name' type='$type'";

	switch ($type)
	{
		case 'checkbox':
			if ($value)
			{
				$output .= " checked='checked'";
			}
			break;

		case 'text':
			$output .= " value='$value'";
			break;
	}

	$output .= ' />';

	return $output;
}

$directives = array(
	'general_disable' => array(
		'description'	=> 'Desativar todo o streaming',
		'type'			=> 'checkbox'
	),
	'force_meeting_finished' => array(
		'description'	=> 'Rematou o encontro',
		'type'			=> 'checkbox'
	),
	'redevida' => array(
		'description'	=> 'Mostrar streaming de Rede Vida',
		'type'			=> 'checkbox'
	),
	'event_start' => array(
		'description'	=> 'Início do evento (hora de Rio)',
		'type'			=> 'text'
	),
	'event_end' => array(
		'description'	=> 'Fim do evento (hora de Rio)',
		'type'			=> 'text'
	),
);

$saved = false;

if (isset($_POST['sent']))
{

	$directives_to_store = array();

	foreach ($directives as $code=>$directive)
	{
		$value_to_store = null;

		if ('checkbox' == $directive['type'])
		{
			$value_to_store = !empty($_POST[$code]);
		}
		else
		{
			if (!empty($_POST[$code]))
			{
				$value_to_store = $_POST[$code];
			}
		}

		$directives_to_store[$code] = $value_to_store;
	}

	$current_config = file_put_contents(CONFIG_FILE, json_encode($directives_to_store));
	apc_clear_cache('user');
	$saved = true;
}

$current_config = json_decode(file_get_contents(CONFIG_FILE), true);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Streaming control</title>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
	<style>
	h1 { margin: 1em 0 1em; }
	h4 small { display: block; }
	</style>
</head>
<body>
	<div class="container">
		<h1>Control do streaming</h1>

		<?php if ($saved) : ?>
		<div class="alert alert-success" onclick="this.style.display='none'">Os cámbios foram salvados corretamente</div>
		<?php endif ?>

		<form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">

			<table class="table">
			<?php foreach ($directives as $code=>$d) : ?>
				<tr>
					<td>
						<h4><?php echo $d['description'] ?><small><?php echo $code ?></small></h4>
					</td>
					<td>
						<?php echo generate_input($code, $current_config[$code], $d['type']) ?>
					</td>
				</tr>
			<?php endforeach ?>
			</table>

			<div class="form-actions text-center">
				<p><strong>Verifique todas as opções antes de guardar!</strong></p>
				<button type="submit" class="btn btn-primary btn-large" name="sent">Salvar</button>
			</div>

		</form>
	</div>
</body>
</html>