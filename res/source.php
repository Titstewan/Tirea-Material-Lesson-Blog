<?php
/*----------------------------
This is a new custom home page for Tirea Tean's Lesson Blog.

This is the main source file for the new index.php.
This file performs the main functions for generating the website.

Following functions are in use:

html_header() - generates the HTML header ad the menu bar
html_bottom() - generates the HTML bottom and contain the disclaimer
home() - obviously, the main home page magic
abc_sound() - creates the sound page and load the tracks
aysaheylu() - renders the link pages
navi_download() - the download page is doneby this
about() - contains credits, authors and copyright blah
navi_lesson() - this vrrtep creates the main lesson page, loads and parses the Na'vi lesson
rss_feed() - generates the RSS XML code of all the lessons

Author: Tìtstewan
titstewan-learnnavi.org
Co-Author: Tirea Aean
tirea-learnnavi.org

Tirea Na'vi Lesson Blog - Easy Lesson Blog
Copyright (C) 2017  Tìtstewan & Tirea Aean
GNU GPLv3
https://www.gnu.org/licenses/gpl-3.0.en.html
----------------------------*/

// Some php functions for generating the site
if (!defined('TLB'))
	die('No direct access...');

// ...html header (<html><body>)...
function html_header()
{
	global $httproot, $weblink, $txt, $lang;

// The dropdown fields
$dropdown = '
			<li><a href="' . $httproot . 'language/switch.php?lang=czech">Česky</a></li>
			<li><a href="' . $httproot . 'language/switch.php?lang=german">Deutsch</a></li>
			<li><a href="' . $httproot . 'language/switch.php?lang=english">English</a></li>
			<li><a href="' . $httproot . 'language/switch.php?lang=esperanto">Esperanto</a></li>
			<li><a href="' . $httproot . 'language/switch.php?lang=french">Français</a></li>
			<li><a href="' . $httproot . 'language/switch.php?lang=navi">Na\'vi</a></li>
			<li><a href="' . $httproot . 'language/switch.php?lang=dutch">Nederlands</a></li>';
// The menu links
$menu = '
					<li><a href="' . $weblink . '">' . $txt['m_home'] . '</a></li>
					<li><a href="' . $weblink . '?p=sounds">' . $txt['m_sounds'] . '</a></li>
					<li><a href="' . $weblink . '?p=lessons">' . $txt['m_lessons'] . '</a></li>
					<li><a href="' . $weblink . '?p=links">' . $txt['m_links'] . '</a></li>
					<li><a href="' . $weblink . '?p=downloads">' . $txt['m_downloads'] . '</a></li>
					<li><a href="' . $weblink . '?p=about">' . $txt['about'] . '</a></li>';

	echo '<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Tirea Na\'vi</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="' . $httproot . 'res/favicon.png">
		<link rel="apple-touch-icon" href="' . $httproot . 'res/favicon.png">
		<link rel="icon" type="image/png" href="' . $httproot . 'res/favicon.png">
		<link rel="alternate" type="application/rss+xml" title="Tirea Na\'vi" href="' . $weblink . '?p=rss&lang=' . $lang . '">
		<link rel="stylesheet" href="' . $httproot . 'res/icons.css">
		<link rel="stylesheet" href="' . $httproot . 'res/materialize.min.css">
		<link rel="stylesheet" href="' . $httproot . 'res/tirea.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="theme-color" content="#00bcd4">
	</head>
	<header>
		<!-- Dropdown Structure -->
		<ul id="dropdown1" class="dropdown-content">', $dropdown, '</ul>
		<nav>
			<div class="nav-wrapper">
				<a href="', $weblink, '" class="brand-logo">Tirea Na&apos;vi</a>
				<!-- <a href="#" data-activates="mobilenav" class="button-collapse"><i class="material-icons">menu</i></a> -->
				<a class="button-collapse" href="#" data-activates="mobilenav"><span id="mobile-menu-icon">&#9776;</span></a>
				<ul class="right hide-on-med-and-down" id="regnav">', $menu, '
					<!-- Dropdown Trigger -->
					<li><a class="dropdown-button" href="', $weblink, '" data-activates="dropdown1">', $txt['m_language'], '<i class="material-icons right">arrow_drop_down</i></a></li>
					<li id="rss-nav-item"><a id="rss-link" href="', $weblink, '?p=rss&lang=', $lang, '"><img id="rss-icon" src="' . $httproot . 'res/rss-icon.png"></a></li>
				</ul>
				<ul class="side-nav" id="mobilenav">', $menu, '
					<li>
						<ul class="collapsible collapsible-accordion">
							<li><a class="collapsible-header waves-effect waves-amber">', $txt['m_language'], '</a>
								<div class="collapsible-body">
									<ul>', $dropdown, '</ul>
								</div>
							</li>
						</ul>
					</li>
					<li><a href="', $weblink , '?p=rss&lang=', $lang, '">', $txt['m_rss'], '</a></li>
				</ul>
			</div>
		</nav>
		<div class="amber black-text" id="warning">', $txt['tlb_exp'], '</div>
	</header>
	<main>
	<div class="container">
		<div id="page-content-div">';
}

// ...end of an html page (</body></html>)... AND Disclaimer
function html_bottom()
{
	global $software_vers, $txt, $weblink;

	echo '
		</div> <!-- #page-content-div -->
	</div> <!-- main .container -->
	<!-- FAB -->
	<div id="fab" class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a class="btn-floating btn-large amber accent-2">
		<i class="large material-icons">search</i>
		</a>
		<ul>
			<li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
			<li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
			<li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
			<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
		</ul>
	</div>
	<div class="foot">', $txt['foot_admin'] , ': <a href="http://forum.learnnavi.org/profile/?u=1975">Tirea Aean</a>,
		<span title="PHP: Hypertext Preprocessor">', $txt['foot_softdev'] , '</span>:
		<a href="http://forum.learnnavi.org/profile/?u=10322">Tìtstewan</a> &amp;
		<a href="http://forum.learnnavi.org/profile/?u=1975">Tirea Aean</a>
	    | ', $txt['foot_disc'] , '<br />
	    <b>\'Ivong Na\'vi!</b>
	<br /><br />
		<a href="', $weblink, '?p=about">', $txt['about'], '</a> - Tirea Na\'vi Web software: <a href="https://github.com/Titstewan/Tirea-Material-Lesson-Blog">', $software_vers, '</a><br />
	</div>
	<script src="' . $httproot . 'res/jquery.min.js"></script>
	<script src="' . $httproot . 'res/materialize.min.js"></script>
	<script src="' . $httproot . 'res/play.js"></script>
	<script>
		$(document).ready(function(){
			$(".button-collapse").sideNav();
			$(".dropdown-button").dropdown();
			$(".collapsible").collapsible();
		});
	</script>
</main>
</html>';
}

// The re-worked material design page!
function home()
{
	global $weblink, $txt;

	echo '
			<div class="tooltip" id="index-tt">
				<div class="titlename"><span>Zola&#39;u N&igrave;prrte&#39;</span></div>
				<span class="tooltiptext">', $txt['h_welcome'], '</span>
			</div>
			<!-- CARD -->
			<div id="image" class="section scrollspy">
				<div class="row">
					<div class="col s12 m12 l12">
						<div class="card">
							<div class="card-image">
								<img src="' . $httproot . 'res/school.jpg">
								<span class="card-title">', $txt['h_title'], '</span>
							</div>
							<div class="card-content">
								<p>', $txt['h_welcome_txt'], '</p>
							</div>
							<div class="card-action">
								<a class="amber-text accent-2" href="', $weblink, '?p=lessons">', $txt['h_get_st'], '</a>
							</div>
						</div>
					</div>
				</div>
			</div>';
}

// The sound page
function abc_sound()
{
	global $txt, $httproot;

	echo '
			<div class="titlename">', $txt['m_sounds'], '</div>
			<p>', $txt['s_intro'], '</p>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['s_vowels'], '</h4></li>
				<li class="collection-item"><div>a [a]<a id="play_a" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>ä [æ]<a id="play_ae" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>e [ɛ]<a id="play_e" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>i [i]<a id="play_i" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>ì [ɪ]<a id="play_ih" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>o [o]<a id="play_o" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item">
					<div>u [u] / [ʊ]
						<a id="play_u1" class="secondary-content amber-text">
							<i class="material-icons">play_circle_filled</i>
						</a>
						<span class="secondary-content black-text">&nbsp; / &nbsp;</span>
						<a id="play_u" class="secondary-content amber-text">
							<i class="material-icons">play_circle_filled</i>
						</a>
					 </div>
				</li>
			</ul>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['s_diphto'], '</h4></li>
				<li class="collection-item"><div>aw [aw]<a id="play_aw" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>ay [aj]<a id="play_ay" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>ew [ɛw]<a id="play_ew" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>ey [ɛj]<a id="play_ey" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
			</ul>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['s_pseudo'], '</h4></li>
				<li class="collection-item"><div>ll [ḷ]<a id="play_ll" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>rr [r]<a id="play_rr" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
			</ul>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['s_conson'], '</h4></li>
				<li class="collection-item"><div>\' [&#660;]<a id="play_tihftang" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>f [f]<a id="play_f" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>h [h]<a id="play_h" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>k [k]<a id="play_k" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>kx [&#107;]<a id="play_kx" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>l [l]<a id="play_l" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>m [m]<a id="play_m" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>n [n]<a id="play_n" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>ng [&#331;]<a id="play_ng" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>p [p]<a id="play_p" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>r [&#638;]<a id="play_r" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>s [s]<a id="play_s" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>t [t]<a id="play_t" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>ts [&#678;]<a id="play_ts" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>tx [&#116;]<a id="play_tx" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>v [v]<a id="play_v" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>w [w]<a id="play_w" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>y [j]<a id="play_y" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
				<li class="collection-item"><div>z [z]<a id="play_z" class="secondary-content amber-text"><i class="material-icons">play_circle_filled</i></a></div></li>
			</ul>
			<audio id="audio_a"><source src="' . $httproot . 'audio/a.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/a.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_ae"><source src="' . $httproot . 'audio/ae.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/ae.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_e"><source src="' . $httproot . 'audio/e.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/e.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_i"><source src="' . $httproot . 'audio/i.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/i.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_ih"><source src="' . $httproot . 'audio/ih.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/ih.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_o"><source src="' . $httproot . 'audio/o.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/o.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_u"><source src="' . $httproot . 'audio/u.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/u.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_u1"><source src="' . $httproot . 'audio/u1.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/u1.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_aw"><source src="' . $httproot . 'audio/aw.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/aw.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_ay"><source src="' . $httproot . 'audio/ay.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/ay.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_ew"><source src="' . $httproot . 'audio/ew.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/ew.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_ey"><source src="' . $httproot . 'audio/ey.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/ey.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_ll"><source src="' . $httproot . 'audio/ll.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/ll.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_rr"><source src="' . $httproot . 'audio/rr.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/rr.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_tihftang"><source src="' . $httproot . 'audio/tihftang.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/tihftang.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_f"><source src="' . $httproot . 'audio/f.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/f.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_h"><source src="' . $httproot . 'audio/h.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/h.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_k"><source src="' . $httproot . 'audio/k.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/k.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_kx"><source src="' . $httproot . 'audio/kx.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/kx.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_l"><source src="' . $httproot . 'audio/l.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/l.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_m"><source src="' . $httproot . 'audio/m.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/m.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_n"><source src="' . $httproot . 'audio/n.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/n.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_ng"><source src="' . $httproot . 'audio/ng.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/ng.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_p"><source src="' . $httproot . 'audio/p.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/p.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_px"><source src="' . $httproot . 'audio/px.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/px.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_r"><source src="' . $httproot . 'audio/r.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/r.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_s"><source src="' . $httproot . 'audio/s.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/s.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_t"><source src="' . $httproot . 'audio/t.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/t.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_ts"><source src="' . $httproot . 'audio/ts.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/ts.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_tx"><source src="' . $httproot . 'audio/tx.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/tx.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_v"><source src="' . $httproot . 'audio/v.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/v.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_w"><source src="' . $httproot . 'audio/w.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/w.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_y"><source src="' . $httproot . 'audio/y.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/y.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>
			<audio id="audio_z"><source src="' . $httproot . 'audio/z.ogg" type="audio/ogg"/><source src="' . $httproot . 'audio/z.mp3" type="audio/mpeg"/>', $txt['no_audio'], '</audio>';
}

// The link page
function aysaheylu()
{
	global $weblink, $txt;

	echo '
			<div class="titlename">', $txt['l_links'], '</div>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['l_cool'], '</h4></li>
				<li class="collection-item"><a class="collection-link" href="https://soundcloud.com/thesoundsofpandora">The Sounds of Pandora</a><br />Official Avatar SoundCloud</li>
				<li class="collection-item"><a class="collection-link" href="http://dict-navi.com">Dict-Na&#39;vi.com</a><br />Online Na&#39;vi Dictionary Search Engine</li>
				<li class="collection-item"><a class="collection-link" href="http://learnnavi.org/navi-numbers">Na&#39;vi Numbers</a><br />Epic Na&#39;vi Number translator thingy</li>
				<li class="collection-item"><a class="collection-link" href="http://www.memrise.com/course/26139/all-navi-vocabulary/">All Na&#39;vi Vocabulary</a><br />Learn Na&#39;vi Memrise Course</li>
				<li class="collection-item"><a class="collection-link" href="http://www.memrise.com/course/51606/navi-useful-phrases/">Na&#39;vi Useful Phrases</a><br />Na&#39;vi Phrases Memrise Course</li>
				<li class="collection-item"><a class="collection-link" href="http://naviteri.org">Na&#39;viteri.org</a><br />Paul Frommer&#39;s Blog</li>
				<li class="collection-item"><a class="collection-link" href="http://layonyayo.com">Layon Yayo</a><br />Na&#39;vi Web Comic by Eana Unil</li>
				<li class="collection-item"><a class="collection-link" href="http://www.avatarnation.net">Avatar Nation</a><br />Avatar Fan Site / Podcast</li>
				<li class="collection-item"><a class="collection-link" href="' . $weblink . '?p=generator">', $txt['l_navi_gen'], '</a><br />', $txt['l_valid_gen'], '</li>
			</ul>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['l_blogs'], '</h4></li>
				<li class="collection-item"><a class="collection-link" href="http://tireaaean.wordpress.com">Pìlok Tireayä Aean</a><br />Tirea Aean</li>
				<li class="collection-item"><a class="collection-link" href="http://masempul.org">Ma Sempul</a><br />Prrton</li>
				<li class="collection-item"><a class="collection-link" href="http://stegemue.blogspot.com">Aylì’uä Ramunong</a><br />Plumps</li>
				<li class="collection-item"><a class="collection-link" href="http://eana-elf.blogspot.com/">Blog of Blue Elf</a><br />Blue Elf</li>
				<li class="collection-item"><a class="collection-link" href="http://leeylan.blogg.se">Le&#39;eylan</a><br />Le&#39;eylan</li>
				<li class="collection-item"><a class="collection-link" href="http://ngawng.blogspot.com">SìLawk LeKye&#39;ung</a><br />Ngawng</li>
				<li class="collection-item"><a class="collection-link" href="http://tsyesika.co.uk">Tsyesìkayä Pìlok</a><br />Tsyesìka</li>
				<li class="collection-item"><a class="collection-link" href="http://eanaunil.blogspot.com/">Tskxekeng ne tìyo&#39;</a><br />Eana Unil</li>
			</ul>';
}

// The download page
function navi_download()
{
	global $txt;

	echo '
			<div class="titlename">', $txt['d_downl'], '</div>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['d_thing'], '</h4></li>
				<li class="collection-item"><a class="collection-link" href="download/101-Handout-4-WA-2012.pdf">Na\'vi 101 Handout [PDF]</a><br />From AvatarMeet 2012 Seattle, WA</li>
				<li class="collection-item"><a class="collection-link" href="download/102-Handout-4-DC-2013.pdf">Na\'vi 102 Handout [PDF]</a><br />From AvatarMeet 2013 Washington, DC</li>
				<li class="collection-item"><a class="collection-link" href="download/103-Handout-4-LA-2014.pdf">Na\'vi 103 Handout [PDF]</a><br />From AvatarMeet 2014 Los Angeles, CA</li>
				<li class="collection-item"><a class="collection-link" href="download/hkb-kxwerty-mod.apk">Hacker&#39;s Keyboard Mod [APK Android App]</a><br />KXWERTY keyboard layout for Android</li>
				<li class="collection-item"><a class="collection-link" href="download/ts3_Client_LN_Sound_Pack-0.2.zip">TS3 Voice Pack [ZIP]</a><br />Na&#39;vi Language support for TeamSpeak 3</li>
				<li class="collection-item"><a class="collection-link" href="download/navkb6.zip">The KXWERTY Keyboard [ZIP]</a><br />KXWERTY keyboard layout for Windows / Mac</li>
				<!-- <li class="collection-item"><a class="collection-link" href="/material/img">', $txt['d_images'], '</a><br />', $txt['d_hrhgif'], '</li> -->
			</ul>';
}

// The About page
function about()
{
	global $txt;

	echo '
			<div class="titlename">', $txt['about'], '</div>
			<br /><br /><ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['a_creator'], '</h4></li>
				<li class="collection-item"><strong>Paul Frommer</strong></li>
			</ul>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['a_developers'], '</h4></li>
				<li class="collection-item"><strong>Tìtstewan & Tirea Aean</strong></li>
			</ul>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['a_thanks'], '</h4></li>
				<li class="collection-item"><strong>Vawmataw, Hahaw[hhvhhvcz], Genaral Anubis, ', $txt['a_others'], '</strong></li>
			</ul>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['a_3rdparty'] ,'</h4></li>
				<li class="collection-item">Parsedown - http://parsedown.org | Copyright (c) 2013 Emanuil Rusev, erusev.com | ', $txt['a_mit'] , '</li>
			</ul>
			<ul class="collection with-header">
				<li class="collection-header"><h4>GNU General Public License</h4></li>
				<li class="collection-item">Copyright (c) 2017 Tìtstewan & Tirea Aean | <a class="collection-link" href="https://www.gnu.org/licenses/gpl-3.0.en.html">GNU General Public License v3.0</a></li>
			</ul><br />';
}

// The Na'vi lessons
function navi_lesson()
{
	global $lessondir, $txt, $lang, $weblink;

	// load the lessons! :D
	$lnum = $_REQUEST['l'];

	// Something (Hopefully lesson) was requested in l= URL var
	if ($lnum != '')
	{
		$l = substr_replace($lnum, $lang, 4);
		// Fire up the Markdown Parser
		require_once 'Parsedown.php';
		$Parsedown = new Parsedown();
		// Ready the Markdown Lesson File
		$f = $lessondir . '/' . $l . '.md';
		// Parse the file and echo it as HTML, or redirect back to index page
		echo is_readable($f) ? $Parsedown->text(file_get_contents($f)) : header('Location: ' . $weblink . '?p=lessons');
	}

	// No lesson was requested, all we do is show Lesson index.
	else
	{
		// we need to define the directory
		$dir = $lessondir . '/';

		// Just to check if the thing we want is a dir
		if (is_dir($dir))
		{
			// Open the dir
			if ($dh = opendir($dir))
			{
				echo '
			<div class="titlename">', $txt['n_lesson'], '</div>
			<br><br>';

				// We need an empty array first
				$files = array();

				// read the files and store them in an array
				while (($file = readdir($dh)) !== false)
				{
					$files[] = $file;
				}

				sort($files);

				echo '
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['n_basic'], '</h4></li>';

				// load and echo the c lessons
				foreach ($files as $f)
				{
					$num = substr($f, 0, 2);
					if (preg_match('/^\d+$/', $num) && stripos($f, 'c-') && stripos($f, $lang))
					{
		    				echo '
				<li class="collection-item"><a class="collection-link" href="', $weblink, '?p=lessons&l=', $num, 'c-', $lang, '">', (preg_match('/^\d+$/', $num) ? $txt['n_' . $num . 'c'] : ''), '</a></li>';
					}
				}

				echo '
			</ul>
			<ul class="collection with-header">
				<li class="collection-header"><h4>', $txt['n_intro'] ,'</h4></li>';

				// load and echo the g lessons
				foreach ($files as $f)
				{
					$num = substr($f, 0, 2);
					if (preg_match('/^\d+$/', $num) && stripos($f, 'g-') && stripos($f, $lang))
					{
						echo '
				<li class="collection-item"><a class="collection-link" href="', $weblink, '?p=lessons&l=', $num, 'g-', $lang, '">', (preg_match('/^\d+$/', $num) ? $txt['n_' . $num . 'g'] : ''), '</a></li>';
					}
				}

				echo '
			</ul>';

			// fin!
			closedir($dh);
			}
		}
	}
}

// Generate the RSS feed
function rss_feed()
{
	global $lessondir, $weblink;
	
	header("Content-Type: application/rss+xml; charset=UTF-8");
	
	$rssfeed = "";
	if (!isset($_REQUEST['lang']))
	{
		$language = 'english';
	}
	else
	{
		$language = $_REQUEST['lang'];
	}

	//header stuff
    $rssfeed .= '<?xml version="1.0" encoding="UTF-8" ?>';
	$rssfeed .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
	$rssfeed .= '<channel>';
	$rssfeed .= '<title>Tirea Na\'vi</title>';
	$rssfeed .= '<link>http://tirea.learnnavi.org/material</link>';
	$rssfeed .= '<atom:link href="http://tirea.learnnavi.org/material/feed.xml" rel="self" type="application/rss+xml"/>';
	$rssfeed .= '<description>Na\'vi Language Lessons for Non-linguists</description>';

	//items
	// we need to define the directory
	$dir = $lessondir . '/';

	// Just to check if the thing we want is a dir
	if (is_dir($dir))
	{
		// Open the dir
		if ($dh = opendir($dir))
		{
			// We need an empty array first
			$files = array();

			// read the files and store them in an array
			while (($file = readdir($dh)) !== false)
			{
				$files[] = $file;
			}

			sort($files);

			foreach ($files as $f)
			{
				$num = substr($f, 0, 2);
				// load and echo the c lessons
				if (preg_match('/^\d+$/', $num) && stripos($f, 'c-') && stripos($f, $language))
				{
					//read file $f and get $title
					$title = fgets(fopen($dir . $f, 'r'));
					
					// Style for the content
					$content = '<![CDATA[<style>ul{padding-left:40px;list-style:none;}table,th,tr,td{text-align:left;}</style>';
					
					// Get $content
					// Fire up the Markdown Parser
					require_once 'Parsedown.php';
					$Parsedown = new Parsedown();
					// Parse the file and echo it as HTML
					$content .= $Parsedown->text(file_get_contents($dir . $f)) . ']]>';

					// Lesson filename minus extension for the URL
					$lname = preg_replace('/\\.[^.\\s]{2}$/', '', $f);

					$rssfeed .= '<item>';
					$rssfeed .= '<title><![CDATA[' . $title . ']]></title>';
					$rssfeed .= '<author>tirea@learnnavi.org (Tirea Aean)</author>';
					$rssfeed .= '<link><![CDATA[' . $weblink . '?p=lessons&l=' . $lname .']]></link>';
					$rssfeed .= '<guid><![CDATA[' . $weblink . '?p=lessons&l=' . $lname .']]></guid>';
					$rssfeed .= '<description>' . $content . '</description>';
					$rssfeed .= '</item>';
				}
				// load and echo the g lessons
				else if (preg_match('/^\d+$/', $num) && stripos($f, 'g-') && stripos($f, $language))
				{
					//read file $f and get $title
					$title = fgets(fopen($dir . $f, 'r'));
					
					// Style for the content
					$content = '<![CDATA[<style>ul{padding-left:40px;list-style:none;}table,th,tr,td{text-align:left;}</style>';
					
					//get $content -- will need the parser
					// Fire up the Markdown Parser
					require_once 'Parsedown.php';
					$Parsedown = new Parsedown();
					// Parse the file and echo it as HTML
					$content .= $Parsedown->text(file_get_contents($dir . $f)) . ']]>';

					// Lesson filename minus extension for the URL
					$lname = preg_replace('/\\.[^.\\s]{2}$/', '', $f);

					$rssfeed .= '<item>';
					$rssfeed .= '<title><![CDATA[' . $title . ']]></title>';
					$rssfeed .= '<author>tirea@learnnavi.org (Tirea Aean)</author>';
					$rssfeed .= '<link><![CDATA[' . $weblink . '?p=lessons&l=' . $lname .']]></link>';
					$rssfeed .= '<guid><![CDATA[' . $weblink . '?p=lessons&l=' . $lname .']]></guid>';
					$rssfeed .= '<description>' . $content . '</description>';
					$rssfeed .= '</item>';
				}
			}
		// fin!
		closedir($dh);
		}
	}

    // closing tags
    $rssfeed .= '</channel>';
	$rssfeed .= '</rss>';
    
    echo $rssfeed;
}
?>
