<?php


namespace BookNotes\Controllers;


use BookNotes\Core\Container;
use BookNotes\Core\Database\QueryBuilder;
use BookNotes\Core\Validator\Validator;

class SignupController extends AbstractController
{
    public function index() {
        return $this->view('signup');
    }

    public function create() {
        /** @var QueryBuilder $query */
        $query = Container::get('query');

        $validator = new Validator($_POST);
        $hashPassword = $validator->validateSignup();
        if($hashPassword) {
            $errors = $validator->getErrors();
            if ($query->findUserByEmail($_POST['email'])) {
                $errors[] = 'This email is already registered.';
            }elseif (count($errors) === 0) {
                $data = [
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => $hashPassword
                ];
                $query->insertUser($data);
                if (isset($_POST['username'])) {
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['message'] = 'You have been successfully registered on our site! Enjoy!';
                }
                header('Location:/login');
                exit;
            }
        }
        return $this->view('signup', ['errors' => $errors] );
    }
}