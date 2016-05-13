<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="hash" content="<?php echo csrf_token(); ?>">
	<title>People Clues</title>

	<link rel="stylesheet" href="<?php echo asset('plugins/morris/morris.css') ?>">

	<!-- App css -->
	<link href="<?php echo asset('css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo asset('css/core.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo asset('css/components.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo asset('css/icons.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo asset('css/pages.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo asset('css/menu.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo asset('css/responsive.css') ?>" rel="stylesheet" type="text/css" />

	<script src="<?php echo asset('js/modernizr.min.js') ?>"></script>

	<script src="<?php echo asset('js/required.js') ?>"></script>  
	<script src="<?php echo asset('js/app.js') ?>"></script>
</head>
<body>
	<?php echo $content; ?>

	
</body>
</html>