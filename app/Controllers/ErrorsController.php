<?php


namespace BookNotes\Controllers;


class ErrorsController extends AbstractController
{
     public function notFound()
    {
        return $this->view('404');
    }
}