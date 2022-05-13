<?php

namespace App\View;

class Display
{

    public function viewLogin(): void
    {
        require_once __DIR__ . "/../../public/view/login.php";
    }

    public function viewRegister(): void
    {
        require_once __DIR__ . "/../../public/view/register.php";
    }

    public function viewUpload(): void
    {
        require_once __DIR__ . "/../../public/view/upload-song.php";
    }

    public function viewJukebox(): void
    {
        require_once __DIR__ . "/../../public/view/homepage.php";
    }
}
