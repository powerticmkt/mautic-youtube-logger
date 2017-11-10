?>
<iframe id="player" height="<?php echo $atts["height"]; ?>" src="https://www.youtube.com/embed/<?php $atts["videoId"]; ?>?enablejsapi=1"></iframe>
<script>
  var player;
  var mauticUrl = $atts["mauticUrlheight"];
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
      case 0:
        tracking = new Image();
        tracking.src = mauticUrl + '/mtracking.gif?tags=' + video_tag + ',' + video_end_tag + '&page_url=' + videoUrl + '&page_title=' + videoTitle;
        document.body.appendChild(tracking);
        break;
      case 1:
        tracking = new Image();
        tracking.src = mauticUrl + '/mtracking.gif?tags=' + video_tag + '&page_url=' + videoUrl + '&page_title=' + videoTitle;;
        document.body.appendChild(tracking);
    }
  }
</script>
<script src="https://www.youtube.com/iframe_api"></script>
<?php
