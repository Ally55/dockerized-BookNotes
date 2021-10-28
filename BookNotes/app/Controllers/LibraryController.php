<?php


namespace BookNotes\Controllers;

use BookNotes\Controllers\AbstractController;
use BookNotes\Core\Container;
use BookNotes\Core\Database\QueryBuilder;
use BookNotes\Core\Validator\Validator;

class LibraryController extends AbstractController
{
    public function listAll()
    {
        return $this->view('library');
    }

    public function createNotes()
    {
        if (!isAuthenticated()) {
            $this->redirect('login');
        }
        return $this->view('create_notes');
    }

    public function create()
    {
        /** @var QueryBuilder $query */
        $query = Container::get('query');

        $validator = new Validator($_POST);

        $data = [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'rate' => $_POST['rate'],
            'cover_link' => $_POST['cover_link'],
            'intro' => $_POST['intro'],
            'body' => $_POST['body']
        ];

        $errors = $validator->validateNotes($data);

        $idUser = $_SESSION['user']['id'];

        if(count($errors) === 0) {
            $data['id_user'] = $idUser;
            $query->insertNotes($data);
        }

        if ($errors) {
            return $this->view('create_notes', compact('errors'));
        }

        if (!isAuthenticated()) {
            $this->redirect('login');
        }

        $this->redirect('library');
    }

    public function userNotes()
    {
        if(!isAuthenticated()) {
            $this->redirect('login');
        }

        return $this->view('user_notes');
    }

    public function read()
    {
        return $this->view('note');
    }
}