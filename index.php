<?php
// For some reasons, we will have to set up a memory limit to keep the server happy
@ini_set('memory_limit', '8M');

// This is kind of important.
define('TLB', 1);

$sourcedir = dirname(__FILE__);

// Emit some headers for some modicum of protection against nasties.
if (!headers_sent())
{
	// Future versions will make some of this configurable. This is primarily a 'safe' configuration for most cases for now.
	header('X-Frame-Options: SAMEORIGIN');
	header('X-XSS-Protection: 1');
	header('X-Content-Type-Options: nosniff');
}

error_reporting(E_ALL & ~E_NOTICE);

// Let's require the source file!
require_once($sourcedir . '/source.php');

// Call the main functions, woo!
// The <html> start tag and the buttors for Na'vigation
html_header();

// The Homepage
// What function shall we execute? (done like this for memory's sake.)
if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'lessons' && isset($_REQUEST['l']))
{
	call_user_func(hp_main(), $_REQUEST['l']);
}
else if ($_REQUEST['page'] == 'generator')
{
	require_once 'generate.php';
	call_user_func(hp_main(), $_REQUEST['a'], $_REQUEST['b'], $_REQUEST['c'], $_REQUEST['k'], $_REQUEST['hrh']);
}
else
{
	call_user_func(hp_main());
}

// The main controlling function.
function hp_main()
{
	global $sourcedir;

	// Here's the $_REQUEST['page'] array - $_REQUEST['page'] => array($file, $function).
	$pageArray = array(
		'sounds' => array('source.php', 'abc_sound'),
		'generator' => array('generate.php', 'name_gen'),
		'links' => array('source.php', 'aysaheylu'),
		'downloads' => array('source.php', 'navi_download'),
		'lessons' => array('source.php', 'navi_lesson'),
	);

	// Get the function and file to include - if it's not there, do the index.
	if (!isset($_REQUEST['page']) || !isset($pageArray[$_REQUEST['page']]))
	{
		// Fall through to the index then...
		require_once($sourcedir . '/index.php');
		return 'home';
	}

	// Otherwise, it was set - so let's go to that page.
	require_once($sourcedir . '/' . $pageArray[$_REQUEST['page']][0]);
	return $pageArray[$_REQUEST['page']][1];
}

// HTML end </html> plus the disclaimer
html_bottom();

?>
