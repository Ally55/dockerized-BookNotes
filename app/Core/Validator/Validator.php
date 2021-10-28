<?php


namespace BookNotes\Core\Validator;


class Validator
{
    private $errors = [];
    private $request = [];

    public function __construct(array $request) {
        $this->request = $request;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function validateLogin()
    {
        $this->validateEmail();

        $this->validatePassword();

        return $this->errors;
    }

    public function validateSignup()
    {
        $this->validateEmail();

        $this->validatePassword();

        $this->validateUsername();

        $hashPassword = $this->validateMatchingPasswords();

        return $hashPassword;
    }

    private function validateEmail()
    {
        $email = $this->request['email'];
        if (empty($email)) {
            $this->errors[] = 'Email field is empty.';
        }
        if (strlen($email) > 255) {
            $this->errors[] = 'Your email is too long.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Your email is not valid.';
        }
    }

    private function validatePassword()
    {
        $password = $this->request['password'];
        if (empty($password)) {
            $this->errors[] = 'Please enter a password.';
        }
        if (strlen($password) < 6) {
            $this->errors[] = 'Your password is too short.';
        }
    }

    private function validateUsername()
    {
        $username = $this->request['username'];
        if(empty($username)) {
            $this->errors[] = 'Please enter a username.';
        }
        if(strlen($username) < 3) {
            $this->errors[] = 'Your username is too short.';
        }
        if(!preg_match('/^[a-zA-Z]+[a-zA-Z0-9]*$/',$username)) {
            $this->errors[] = 'Your username must begin with a letter.';
        }
    }

    private function validateMatchingPasswords()
    {
        $password = $this->request['password'];
        $confirmPassword = $this->request['confirm_password'];
        $hashPassword = '';

        if($password === $confirmPassword) {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $this->errors[] = 'The passwords do not match.';
        }

        return $hashPassword;
    }

    public function validateNotes($data)
    {
        $this->validateTitleNote($data);

        $this->validateAuthorNote($data);

        $this->validateRateNote($data);

        $this->validateCoverLinkNote($data);

        $this->validateIntroNote($data);

        $this->validateBodyNote($data);

        return $this->errors;
    }

    private function validateTitleNote($data)
    {
        if (empty($data['title'])) {
            $this->errors[] = 'The title field should not be empty.';
        }
        if (strlen($data['title']) > 100) {
            $this->errors[] = 'This title is too long. Please insert an available book title.';
        }
        if (!preg_match('/[a-zA-Z]/',$data['title'])) {
            $this->errors[] = 'The book title must contain letters.';
        }
    }

    private function validateAuthorNote($data)
    {
        if (empty($data['author'])) {
            $this->errors[] = 'The author field should not be empty.';
        }
        if (strlen($data['author']) > 100) {
            $this->errors[] = 'The name of the author is too long.';
        }
        if (!preg_match('/[a-zA-Z]/',$data['author'])) {
            $this->errors[] = 'The author field must only contain letters.';
        }
    }

    private function validateRateNote($data)
    {
        if (empty($data['rate'])) {
            $this->errors[] = 'The rate field should not be empty.';
        }
        $data['rate'] = (int) $data['rate'];
        if ($data['rate'] === 0) {
            $this->errors[] = 'The rate field should be grater than 0.';
        }
        if ($data['rate'] > 10) {
            $this->errors[] = 'The book rate should be minimum 1 and maximum 10.';
        }
    }

    private function validateCoverLinkNote($data)
    {
        if (empty($data['cover_link'])) {
            $this->errors[] = 'The cover link field should not be empty.';
        }
        if (strlen($data['cover_link']) > 255) {
            $this->errors[] = 'The cover link is too long.';
        }
    }

    private function validateIntroNote($data)
    {
        if (empty($data['intro'])) {
            $this->errors[] = "The note's intro should not be empty.";
        }
    }

    private function validateBodyNote($data)
    {
        if (empty($data['body'])) {
            $this->errors[] = "The note's body should not be empty.";
        }
    }

}