<?php
// This file is here solely to protect this directory.
// Look for index.php....
if (file_exists(dirname(dirname(__FILE__)) . '/index.php'))
{
	// Found it!
	require(dirname(dirname(__FILE__)) . '/index.php');
	header('Location: ' . $weblink);
}
// Can't find it... just forget it.
else
	exit;
?>
