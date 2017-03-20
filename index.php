<?php
/*----------------------------
This is a new custom home page for Tirea Tean's Lesson Blog.

This is the main index.php.
This is the "mother page" :P

Following functions are in use:

hp_main()

Author: Tìtstewan
titstewan-learnnavi.org
Co-Author: Tirea Aean
tirea-learnnavi.org
----------------------------*/

// For some reasons, we will have to set up a memory limit to keep the server happy
@ini_set('memory_limit', '16M');

// This is kind of important.
define('TLB', 1);

// Error reports! WoOoOOoo!
error_reporting(E_ALL & ~E_NOTICE);

// Emit some headers for some modicum of protection against nasties.
if (!headers_sent())
{
	// Future versions will make some of this configurable. This is primarily a 'safe' configuration for most cases for now.
	header('X-Frame-Options: SAMEORIGIN');
	header('X-XSS-Protection: 1');
	header('X-Content-Type-Options: nosniff');
}

// Since tirea.learnnavi.org is a sub domain of learnnavi.org, it should support https, if Mark enable it fir tirea.learnnavi.org
//if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off')
//{
//	$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//	header('Location: ' . $redirect);
//	exit();
//}

// Let's require the source file!
require_once('settings.php');
require_once($sourcedir . '/res/source.php');

// Which languages shall we load?
$lang = 'english';

// require the languages file
require_once($sourcedir . '/language/' . $lang . '.php');

// Call the main functions, woo!
// The <html> start tag and the buttors for Na'vigation
html_header();

// The Homepage
// What function shall we execute? (done like this for memory's sake.)
if (isset($_REQUEST['p']) && $_REQUEST['p'] == 'lessons' && isset($_REQUEST['l']))
{
	call_user_func(hp_main(), $_REQUEST['l']);
}
else
{
	call_user_func(hp_main());
}

// The main controlling function.
function hp_main()
{
	global $sourcedir;

	// Here's the $_REQUEST['p'] array - $_REQUEST['p'] => array($file, $function).
	$pageArray = array(
		'sounds' => array('/res/source.php', 'abc_sound'),
		'generator' => array('/res/generate.php', 'name_gen'),
		'links' => array('/res/source.php', 'aysaheylu'),
		'downloads' => array('/res/source.php', 'navi_download'),
		'lessons' => array('/res/source.php', 'navi_lesson'),
	);

	// Get the function and file to include - if it's not there, do the index.
	if (!isset($_REQUEST['p']) || !isset($pageArray[$_REQUEST['p']]))
	{
		// Fall through to the index then...
		require_once($sourcedir . '/index.php');
		return 'home';
	}

	// Otherwise, it was set - so let's go to that page.
	require_once($sourcedir . '/' . $pageArray[$_REQUEST['p']][0]);
	return $pageArray[$_REQUEST['p']][1];
}

// HTML end </html> plus the disclaimer
html_bottom();
?>
