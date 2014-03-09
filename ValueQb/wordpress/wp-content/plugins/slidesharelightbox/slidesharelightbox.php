<?php
/*
Plugin Name: Slideshare Lightbox
Description: A plugin for displaying slideshare presentations using lightbox.
Version: 1.0
Author: Nibhay Joshi
License: GPL2
*/

/*  Copyright 2012  Nibhay Joshi  (email : nibhayj@gmail.com)

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

function slidesharelightbox_enqueue_scripts() {
    wp_enqueue_script('nivo-slider'
                      ,plugins_url('slidesharelightbox/nivo-slider/jquery.nivo.slider.pack.js')
                      ,array('jquery'));
}

function slidesharelightbox_enqueue_styles() {
    wp_enqueue_style('nivo-slider', plugins_url('slidesharelightbox/nivo-slider/nivo-slider.css'));
    wp_enqueue_style('nivo-slider-theme-default', plugins_url('slidesharelightbox/nivo-slider/themes/default/default.css'));
    wp_enqueue_style('nivo-slider-theme-dark', plugins_url('slidesharelightbox/nivo-slider/themes/dark/dark.css'));
    wp_enqueue_style('nivo-slider-theme-bar', plugins_url('slidesharelightbox/nivo-slider/themes/bar/bar.css'));
    wp_enqueue_style('nivo-slider-theme-light', plugins_url('slidesharelightbox/nivo-slider/themes/light/light.css'));
}

define("SLIDESHARE_OEMBED_ENDPOINT", 'http://www.slideshare.net/api/oembed/2');

function slidesharelightbox($content) {
    $new_content = preg_replace_callback('#(http://|https://)*www\.slideshare\.net/[[:alnum:]]+/[[:alnum:]-]+#',
        function ($matches) {
            $presentation_url = trim($matches[0]);
            $request_url = SLIDESHARE_OEMBED_ENDPOINT . '?url=' . urlencode($presentation_url) . '&format=json';
            $raw_json_response = wp_remote_fopen($request_url);
            $response = NULL;
            if ($raw_json_response) {
                $response = json_decode($raw_json_response);
            } else {
                return 'An error occured while loading the presentation at ' . $presentation_url;
            }

            if ($response) {
                $presentation_id = md5($presentation_url);
                $replacement = <<<PRE
                     <h2>$response->title</h2>
                     <div class="slider-wrapper theme-light">
                        <div class="ribbon"></div>
                        <div id="$presentation_id" class="nivoSlider">
PRE;
                for ($index = 1; $index <= $response->total_slides; ++$index) {
                    $replacement .= <<<CONTENT
                            <img src="$response->slide_image_baseurl$index$response->slide_image_baseurl_suffix"/>
CONTENT;
                }

                $replacement .= <<<POST
                        </div>
                    </div>
                    <script type="text/javascript">
                        jQuery(window).load(function() {
                            jQuery('div#$presentation_id').nivoSlider({
                                effect: 'slideInRight',
                                manualAdvance: false,
                                pauseTime: 5000
                            });
                            jQuery('div#slidesharelightbox_presentation_list').append(
                                '<img src="$response->thumbnail" width="$response->thumbnail_width" height="$response->thumbnail_height"/>'
                            );
                        });
                    </script>
POST;
                return $replacement;
            } else {
                return <<<ERROR
                    An error was encountered while parsing the JSON response.\n
                    Presentation URL : $presentation_url\n
                    Request URL: $request_url\n
                    Response : $raw_json_response
ERROR;
            }
        }, $content);

    return $new_content;
}

remove_filter( 'the_content', array( $GLOBALS['wp_embed'], 'autoembed' ), 8 );
add_action('wp_enqueue_scripts', 'slidesharelightbox_enqueue_styles');
add_action('wp_enqueue_scripts', 'slidesharelightbox_enqueue_scripts');
add_filter('the_content', 'slidesharelightbox');
?>
