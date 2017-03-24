<?php
// This file now doubles as a switcher to the language contained within
setcookie('lang', $_REQUEST['lang'], time() + (86400 * 30), '/', $domain);
//
// Mooo
if (isset($_SERVER['HTTP_REFERER']))
{
	$last_page = $_SERVER['HTTP_REFERER'];
}
else
{
	$last_page = $rootlink . '/material';
}
header('Location: ' . $last_page);
?>
