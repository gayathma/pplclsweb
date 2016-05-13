<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="hash" content="<?php echo csrf_token(); ?>">
      <title>H1 - ACME Corp</title>
      <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
      <link type="text/css" href="<?php echo asset('css/app.css') ?>" rel="stylesheet">
      <script src="<?php echo asset('js/required.js') ?>"></script>  
      <script src="<?php echo asset('js/app.js') ?>"></script>
  </head>
  <body>
      <?php echo $content; ?>
  </body>
</html>