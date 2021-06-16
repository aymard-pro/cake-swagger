<?php
use Cake\Core\Configure;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->Html->charset() ?>
	<title><?= Configure::read('CakeSwagger.ui.title') ?></title>
	<?= $this->Html->css([
		'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Source+Code+Pro:300,600|Titillium+Web:400,600,700',
		'https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.23.11/swagger-ui.css'
	]) ?>
	<?= $this->Html->meta(
		'favicon.ico',
		'CakeSwagger./assets/favicon-32x32.png',
		['type' => 'icon', 'sizes' => '32x32']
	);
	?>
	<?= $this->Html->meta(
		'favicon.ico',
		'CakeSwagger./assets/favicon-16x16.png',
		['type' => 'icon', 'sizes' => '16x16']
	);
	?>
	<?= $this->fetch('css') ?>
	<style>
		html {
			box-sizing: border-box;
			overflow: -moz-scrollbars-vertical;
			overflow-y: scroll;
		}
		
		*,
		*:before,
		*:after {
			box-sizing: inherit;
		}
		
		body {
			margin: 0;
			background: #fafafa;
		}
	</style>
</head>
<body>
<?= $this->element('CakeSwagger.loader') ?>
<?= $this->fetch('content') ?>
<?= $this->Html->script([
	'https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.23.11/swagger-ui-bundle.js',
	'https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.23.11/swagger-ui-standalone-preset.js'
]) ?>
<?= $this->fetch('script') ?>
</body>
</html>
