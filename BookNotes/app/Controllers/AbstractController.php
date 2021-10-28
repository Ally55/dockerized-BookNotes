<?php
namespace BookNotes\Controllers;

abstract class AbstractController
{
    protected function view($nameOfFile, $data = [])
    {
        extract($data);

        return include dirname(__DIR__) . "/views/base.php";
    }

    protected function redirect($path)
    {
        header("Location: /{$path}");
        exit;
    }

}