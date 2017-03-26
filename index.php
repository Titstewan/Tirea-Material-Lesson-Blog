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

Tirea Na'vi Lesson Blog - Easy Lesson Blog
Copyright (C) 2017  Tìtstewan & Tirea Aean
GNU GPLv3
https://www.gnu.org/licenses/gpl-3.0.en.html
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

// Which languages shall we load?
if (!isset($_COOKIE['lang']))
{
	setcookie('lang', 'english', time() + (86400 * 30), '/', $domain);
	$lang = 'english';
}
else
{
	$lang = $_COOKIE['lang'];
}

// get the langs
if (isset($_GET['lang']))
{
	setcookie('lang', $_GET['lang'], time() + (86400 * 30), '/', $domain);
	$lang = $_GET['lang'];
}

// Let's require the source file!
require_once(dirname(__FILE__) . '/settings.php');
require_once($sourcedir . '/source.php');

// require the languages file: check if cookie was set, if not use english as default else continue normal
if (!isset($_COOKIE['lang']))
{
	require_once($langdir . '/english.php');
}
else
{
	require_once($langdir . '/' . $lang . '.php');
}

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
		'sounds' => array('source.php', 'abc_sound'),
		'generator' => array('generate.php', 'name_gen'),
		'links' => array('source.php', 'aysaheylu'),
		'downloads' => array('source.php', 'navi_download'),
		'lessons' => array('source.php', 'navi_lesson'),
		'about' => array('source.php', 'about'),
	);

	// Get the function and file to include - if it's not there, do the index.
	if (!isset($_REQUEST['p']) || !isset($pageArray[$_REQUEST['p']]))
	{
		// Fall through to the index then...
		require_once(dirname(__FILE__) . '/index.php');
		return 'home';
	}

	// Otherwise, it was set - so let's go to that page.
	require_once($sourcedir . '/' . $pageArray[$_REQUEST['p']][0]);
	return $pageArray[$_REQUEST['p']][1];
}

// HTML end </html> plus the disclaimer
html_bottom();
?>
