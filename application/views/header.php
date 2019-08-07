<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Ponto Eletrônico Web</title>
	
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?= $file; ?>" />
	<?php endforeach; ?>

	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>" />
</head>
<body>