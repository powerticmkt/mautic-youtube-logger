<?php
/*
* Plugin Name: Mautic Youtube Logger
* Description: Register Youtube plays on Mautic Timeline
* Version: 1.0.5
* Author: Powertic
* Author URI: https://powertic.com
*/

function mautic_youtube( $atts ) {

	$mautic = $atts['mauticurl'];
	$videoid = $atts['videoid'];

	$atts = shortcode_atts( array(
	  'height' => '500px',
	), $atts );

	$height = $atts['height'];

$res = <<<EOT
	<iframe id="player" height="{$height}" src="https://www.youtube.com/embed/{$videoid}?enablejsapi=1"></iframe>
	<script>
	  var player;
	  var mauticUrl = "{$mautic}";
	  function onYouTubeIframeAPIReady() {
	    player = new YT.Player('player', {
	      events: {
	        'onStateChange': onPlayerStateChange
	      }
	    });
	  }
	  function onPlayerStateChange(event) {
	    var videoUrl = event.target.getVideoUrl();
	    var videoTitle = player.getVideoData()['title'];
	    var videoid = player.getVideoData()['video_id'];
	    var video_tag = 'youtube_' + videoid;
	    var video_end_tag = video_tag + "_end";
			switch (event.data) {
				case 1:
					tracking = new Image();
					tracking.src = mauticUrl + '/mtracking.gif?tags=' + video_tag + '&page_url=' + videoUrl + '&page_title=' + videoTitle;;
					document.body.appendChild(tracking);
				break;
			}
	  }
	</script>
	<script src="https://www.youtube.com/iframe_api"></script>
EOT;

	return $res;

}
add_shortcode( 'mautic_youtube', 'mautic_youtube' );

