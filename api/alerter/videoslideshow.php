<!DOCTYPE html>
<html>
<head>
  <style>
    #videoPlayer {
      width: 100%;
    }
  </style>
</head>
<body>
  <div id="videoPlayer">
    <video id="video" controls autoplay>
      <source id="videoSource" src="" type="video/mp4">
    </video>
  </div>

  <script>
    var videoList = 
    [
    <?php 
      $directory = './videos';  
      $files = glob($directory . '/*.mp4');
      foreach ($files as $file) 
        echo '"'.$directory."/".$file.'",';
    ?>       
      // Add more video filenames here
    ];

    var videoIndex = 0;
    var videoElement = document.getElementById("video");
    var videoSourceElement = document.getElementById("videoSource");

    function playNextVideo() {
      videoSourceElement.src = videoList[videoIndex];
      videoElement.load();
      videoElement.play();

      videoIndex++;
      if (videoIndex >= videoList.length) {
        videoIndex = 0;
      }
    }

    videoElement.addEventListener("ended", playNextVideo);
    playNextVideo();
  </script>
</body>
</html>