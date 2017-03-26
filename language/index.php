<?php
// This file is here solely to protect this directory.
define('TLB', 1);
// This file is here solely to protect your Themes directory.
// Look for settings.php....
if (file_exists(dirname(dirname(__FILE__)) . '/settings.php'))
{
	// Found it!
	require(dirname(dirname(__FILE__)) . '/settings.php');
	header('Location: ' . $weblink);
}
// Can't find it... just forget it.
else
	exit;
?>
