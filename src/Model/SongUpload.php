<?php

namespace App\Model;

use Core\Model;

class SongUpload extends Model
{

        public function insertSong(array $song_data)
        {

                $countfiles = count(array($_FILES['song']['name']));


                $sql = "INSERT INTO music (user, artist, song_name, songfile_path, songfile_name, albumart_path, albumart_name) VALUES (:user, :artist, :song_name, :songfile_path, :songfile_name, :albumart_path, :albumart_name)";
                $db = $this->db;

                # File Name


                for ($i = 0; $i < $countfiles; $i++) {

                        $songfilename  = $_FILES['song']['name'][$i];
                        $albumartfilename = $_FILES['albumart']['name'][$i];



                        # Location
                        $songfile = $_SERVER['DOCUMENT_ROOT'] . '/public/jukebox/music/' . $songfilename;
                        $albumartfile = $_SERVER['DOCUMENT_ROOT'] . '/public/jukebox/album-art/' .       $albumartfilename;






                        # File Extension - Song
                        $file_extension_song = pathinfo(
                                $songfile,
                                PATHINFO_EXTENSION
                        );
                        $file_extension_song = strtolower($file_extension_song);
                        $valid_extension_song = array("mp3");



                        # File Extension - Album Art
                        $file_extension_albumart = pathinfo(
                                $albumartfile,
                                PATHINFO_EXTENSION
                        );


                        $file_extension_albumart = strtolower($file_extension_albumart);
                        $valid_extension_albumart = array("jpg", "png", "jpeg");

                        if (in_array($file_extension_song, $valid_extension_song) && in_array($file_extension_albumart, $valid_extension_albumart)) {

                                if (
                                        move_uploaded_file(
                                                $_FILES['song']['tmp_name'][$i],
                                                $songfile
                                        )
                                        &&
                                        move_uploaded_file(
                                                $_FILES['albumart']['tmp_name'][$i],
                                                $albumartfile
                                        )
                                ) {
                                        $db->query($sql);
                                        $db->bind(':user', $song_data['user']);
                                        $db->bind(':artist', $song_data['artist']);
                                        $db->bind(':song_name', $song_data['song_name']);
                                        $db->bind(':songfile_path', $songfile);
                                        $db->bind(':songfile_name', $songfilename);
                                        $db->bind(':albumart_name', $albumartfilename);
                                        $db->bind(':albumart_path', $albumartfile);

                                        if ($db->execute()) {
                                                return true;
                                                header('Location: ' . $_SERVER['PHP_SELF']);
                                                die;
                                        }

                                        $db = null;
                                        return false;
                                }
                        }
                }
        }



        public function displayAll(): array
        {
                $sql = "SELECT * FROM music";

                $db = $this->db;
                $db->query($sql);
                $db->execute();
                $data = $db->fetchAll();

                return $data;
        }
}
