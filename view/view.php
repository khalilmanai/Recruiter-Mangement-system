<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' />
    <link rel="stylesheet" href='./styles/styles.css' />
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once($ROOT.$DS."view".$DS."header.php");

// détermine le chemin de la vue en fonction du controller qu'on utilise
$filepath = $ROOT.$DS."view".$DS.$controller.$DS;

// détermine le nom du fichier
$filename = "view".ucfirst($view).ucfirst($controller).'.php'; 

require_once($filepath.$filename);

require_once($ROOT.$DS."view".$DS."footer.php");
?>
</body>
</html>