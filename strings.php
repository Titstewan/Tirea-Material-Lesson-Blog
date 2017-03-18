<?php
/*----------------------------
This is a new custom home page for Tirea Tean's Lesson Blog.

This is the main strings.php file where all site interface and page texts and translations to other languages are stored.

This file serves as part of the Site International Translation system.

The following functions are in use:

text()

Author: Tìtstewan
titstewan-learnnavi.org
Co-Author: Tirea Aean
tirea-learnnavi.org
----------------------------*/

function text(key, langcode) {
	
    switch langcode {
      case "en":
          return $en["key"]; //the key should always be one that exists
      default:
          return ""; //should never happen
	
}

$en = array(
    // Header Nav Items
    "nav-Home" => "Home",
    "nav-Sounds" => "Sounds",
    "nav-Lessons" => "Lessons",
    "nav-Links" => "Links",
    "nav-Downloads" => "Downloads",
    "nav-RSSFeed" => "RSS Feed",
    
    // Index Page content
    "index-Welcome" => "Welcome",
    "index-CardTitle" => "Easy Grammar Lessons",
    "index-CardContent" => "Welcome to Tirea Na'vi! This site exists to teach the Na'vi Language to everyone in an easy to understand way. For all you non-linguist Avatar fans out there, I hope to help you on your way to becoming the next speaker of this amazing language. -- Tirea Aean",
    "index-CardLink" => "GET STARTED",
    
    // Foot Content
    "foot-author" => "Website Admin/Designer",
    "foot-software" => "Software development",
    "foot-and" => "and",
    "foot-ln" => "This site was created by members of the <a href='http://learnnavi.org/'>LearnNa&apos;vi.org</a> forum.",
    "foot-disclaimer" => "This site is not affiliated with the official Avatar website, James Cameron, Lightstorm Entertainment or the Twentieth Century Fox Film Corporation. All Trademarks and Servicemarks are the properties of their respective owners.",
    
);