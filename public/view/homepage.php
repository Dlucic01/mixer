<?php


use App\Controller\SongUploadController;
use App\Controller\SessionController;

$valid_user = new SessionController;

if (!$valid_user->isAllowed()) {
    header("Location: /login?not_valid_user");
    exit();
}

use App\Model\SongUpload;

$song_list = new SongUpload;
$data = $song_list->displayAll();
?>


<!doctype html>
<html class="no-js" lang="">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Homepage</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../resources/css/style_org.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

</head>

<body>
    <div class="body_center">
        <?php
        if (isset($_POST['main_song'])) {
            list($artx, $songx, $artistx, $playingx) = explode('|', $_POST['main_song']);
        ?>


            <br>
            <br>


            <!-- Music Player -->
            <h3>Now Playing: <?php echo $playingx ?> | By: <?php echo $artistx ?><h3>
                    <br>
                    <div id="player">
                        <div class="song">
                            <img class="main_song" width="200" height="200" src="../public/jukebox/album-art/<?php echo $artx; ?>">


                            <!-- Audio Visualizer -->

                            <audio crossOrigin="anonymus" id="audio" controls class="music_player">
                                <source src="../public/jukebox/music/<?php echo $songx;  ?>" type="audio/mpeg">
                            </audio>
                        </div>
                        <canvas id='canvas' width="400" height="250"></canvas>

                        <script src="../../resources/js/audio_visualizer.js"></script>

                    </div>
                <?php
            } else {
                ?>

                    <!-- Placeholder Player -->
                    <div class="song">
                        <img class="main_song" width="200" height="200" src="../../resources/images/vinyl_icon.png">
                        <audio controls class="music_player">
                        </audio>
                    </div>
                    </br>
                    </br>


                <?php
            }
                ?>

                <h2 style="text-align: center;">Mixer</h2>
                <?php
                $count = count($data);
                for ($i = 0; $i < $count; $i++) {
                ?>
                    <form name="pick" action="/" method="post">

                        <button class="button_song" type="submit" name="main_song" value="<?php echo $data[$i]['albumart_name']; ?> |<?php echo $data[$i]['songfile_name']  ?> |<?php echo $data[$i]['artist']  ?> |<?php echo $data[$i]['song_name']  ?>">

                            <img width="130" height="130" src="/public/jukebox/album-art/<?php echo $data[$i]['albumart_name']; ?>">
                        <?php } ?>
                        </button>
                        </from>
    </div>
    <?php
    include_once('resources/html/footer.php');
    ?>
</body>

</html>