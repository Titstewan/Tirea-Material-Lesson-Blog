<?php
// This file is here solely to protect this directory.
define('TLB', 1);
// Look for index.php....
if (file_exists(dirname(dirname(__FILE__)) . '/settings.php'))
{
	// Found it!
	require_once(dirname(dirname(__FILE__)) . '/settings.php');
	echo '<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Kehe</title>
		<meta charset="UTF-8">
	</head>
	<main>
	<div>
		Kehe.
	</div>
	<a href="', $weblink, '">Home</a>
	</main>
</html>';
}
// Can't find it... just forget it.
else
	exit;
?>
