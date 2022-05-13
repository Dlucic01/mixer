<?php
namespace Lib;

class TestInput
{
    public static function test_input(string $input) : string
    {
        $input = trim($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);

        return $input;
    }
}
