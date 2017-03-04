<?php
/*
Plugin Name: Placeholder images
Plugin URI: http://lolitaframework.com
Description: Plugin for adding placeholder image in to post.
Version: 1.0
Author: Guriev Eugen
Author URI: https://lolitaframework.com/
License: GPLv2 or later
Text Domain: placeholderimages
*/

// ==============================================================
// Bootstraping
// ==============================================================
if (!class_exists('\placeholderimages\LolitaFramework')) {
    require_once('LolitaFramework/LolitaFramework.php');
    $lolita_framework = \placeholderimages\LolitaFramework::getInstance(__DIR__);
    \placeholderimages\LolitaFramework::define('PI_BASE_DIR', $lolita_framework->baseDir());
    \placeholderimages\LolitaFramework::define('PI_BASE_URL', $lolita_framework->baseUrl());
    $lolita_framework->addModule('Configuration');
}
