<?php

namespace BookNotes\Controllers;

use BookNotes\Core\Container;
use BookNotes\Core\Database\QueryBuilder;

class IndexController extends AbstractController
{
    public function index() {
        $this->log();

        return $this->view('index');
    }

    private function log() {
        /** @var QueryBuilder $query */
        $query = Container::get('query');
        $query->insertLog($_SERVER['REMOTE_ADDR']);
    }
}
