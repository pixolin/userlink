<?php
/*
Plugin Name: User Link
Description: Ads Shortcode that displays different links accoprding to user role
Author: Bego Mario Garde
Author URI: http://pixolin.de
Version: 1.0
License: GPL2
*/

/*

    Copyright (C) 2017  Bego Mario Garde  <pixolin@pixolin.de>

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


function userlink_shortcode( $atts, $content ) {
	$atts = shortcode_atts(
		array(
			'url'          => '',
			'auction-user' => '',
		), $atts
	);

	$url = $atts['url'];

	if ( current_user_can( 'auction-user' ) || current_user_can( 'pending_' ) ) {
		$url = $atts['auction-user'];
	}

	return '<a href="' . $url . '" class="userlink">' . $content . '</a>' ;
}
add_shortcode( 'userlink','userlink_shortcode' );
