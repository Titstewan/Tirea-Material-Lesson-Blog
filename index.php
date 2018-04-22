<?php
/*----------------------------
This is a new custom home page for Tirea Tean's Lesson Blog.

This is the main index.php - the "mother page" :P

Following functions are in use:

hp_main() - generates the homepages AND manages all the other pages

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

// Let's require the source and settings file!
require_once(dirname(__FILE__) . '/settings.php');
require_once($sourcedir . '/source.php');

// Re-defining the $lang_array ;)
$lang_files = ls($langdir . '/');
$i = 0;
foreach($lang_files as $f)
{
	if ($f != 'index.php' && $f != 'switch.php' && $f != '.' && $f != '..')
	{
		$lang_array[$i] = preg_replace('/\\.[^.\\s]{3}$/', '', $f);
		$i++;
	}
}

// Which languages shall we load? First let's check if the cookie was set.
if (!isset($_COOKIE['lang']))
{
	setcookie('lang', 'english', time() + (86400 * 30), '/');
	$lang = 'english';
}
// What if we have a link to a specific language lession that is not in english or anything else that come frome the cookie value?
elseif (isset($_REQUEST['l']))
{
	$lang = (in_array(substr($_REQUEST['l'], 4), $lang_array, true) ? substr($_REQUEST['l'], 4) : 'english');
}
// What if we use a request to chenge the cookie language value?
elseif (isset($_REQUEST['lang']))
{
	setcookie('lang', $_REQUEST['lang'], time() + (86400 * 30), '/');
}
// It was already set? Cooless.
else
{
	$lang = (in_array($_COOKIE['lang'], $lang_array, true) ? $_COOKIE['lang'] : 'english');
}

// get the langs
if (isset($_GET['lang']))
{
	setcookie('lang', $_GET['lang'], time() + (86400 * 30), '/');

	// We need to check if the language in a cookie is valid
	$lang = (in_array($_GET['lang'], $lang_array, true) ? $_GET['lang'] : 'english');
}

// require the languages file: check if cookie was set if not use english as default...
if (!isset($_COOKIE['lang']))
{
	require_once($langdir . '/english.php');
}
// ...else continue
else
{
	require_once($langdir . '/' . $lang . '.php');
}

// Call the main functions, woo!
// The <html> start tag and the buttons for Na'vigation (Oel tse'a kemit a soli.png)
if (!isset($_REQUEST['p']) || $_REQUEST['p'] != 'rss')
{
	html_header();
}

// The Homepage
// What function shall we execute? (done like this for memory's sake.)
call_user_func(hp_main());

// The main controlling function: Load all the stuff!
function hp_main()
{
	global $sourcedir;

	// Here's the $_REQUEST['p'] array - $_REQUEST['p'] => array($file, $function).
	$pageArray = array(
		'about' => array('source.php', 'about'),
		'downloads' => array('source.php', 'navi_download'),
		'lessons' => array('source.php', 'navi_lesson'),
		'links' => array('source.php', 'aysaheylu'),
		'random' => array('source.php', 'navi_random'),
		'rss' => array('source.php', 'rss_feed'),
		'sounds' => array('source.php', 'abc_sound'),
		'generator' => array('generate.php', 'name_gen'),
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
if (!isset($_REQUEST['p']) || $_REQUEST['p'] != 'rss')
{
	html_bottom();
}
?>
