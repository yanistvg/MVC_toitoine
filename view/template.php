<html>
<head>
	<title><?php echo $title; ?></title>
	<meta charset = "utf-8"/>
	 <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
	 <link rel="stylesheet" type="text/css" href="public/css/specia.css">
	 <script src="public/script/redirect.js"></script>
	<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	?>

</head>
<body>
		<?php echo $content; ?>
		<img id="specia_logo" src="public/images/logo-1.png">
</body>
</html>