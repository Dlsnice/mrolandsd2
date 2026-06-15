<?php
/*
Plugin Name: Widget Content Blocks
Plugin URI: https://dannyvankooten.com/wordpress-plugins/wysiwyg-widgets/
Description: Adds a WYSIWYG Widget with a rich text editor and media upload functions.
Version: 2.3.11
Author: Danny van Kooten
Author URI: http://dvk.co/
Text Domain: wysiwyg-widgets
Domain Path: /languages/
License: GPL v3 or later

WYSIWYG Widgets plugin

Copyright (C) 2013-2026, Danny van Kooten, hi@dannyvankooten.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

defined('ABSPATH') or exit;

define( 'WYWI_PLUGIN_DIR', __DIR__ . '/' );

require_once __DIR__ . '/includes/plugin.php';

// only load admin class for non-ajax requests to the admin section
if( is_admin() && ! wp_doing_ajax() ) {
	require_once __DIR__ . '/includes/class-admin.php';
	new WYSIWYG_Widgets_Admin();
}
