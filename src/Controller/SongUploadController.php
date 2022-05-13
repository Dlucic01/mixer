
<?php

namespace App\Controller;

error_reporting(E_ALL);

use Core\Controller;
use App\Model\SongUpload;

class SongUploadController extends Controller
{
    public static function uploadSongControll()
    {
        $song_data = $_POST;

        $user_data = new SongUpload;

        try {
            $user_data->insertSong($song_data);
            echo "Good";
        } catch (\PDOException $e) {
            $e->getMessage();
        }
    }

    public function displaySongs(): array
    {
        $song_list = new SongUpload;

        $data = $song_list->displayAll();
        return $data;
    }

    public function displayMainSong()
    {
        $
    }
}
