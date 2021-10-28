<?php

function validateInput() {
    $errors = [];
    $email = $_POST['email'];
    if (empty($email)) {
        $errors[] = 'Email field is empty.';
    }
    if (strlen($email) > 255) {
        $errors[] = 'Your email is too long.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Your email is not valid.';
    }

    $password = $_POST['password'];
    if(empty($password)) {
        $errors[] = 'Please enter a password.';
    }
    if(strlen($password) < 6) {
        $errors[] = 'Your password is too short.';
    }
    return $errors;
}

function validateNotes($data) {
    $errors = [];

    if (empty($data['title'])) {
        $errors[] = 'The title field should not be empty.';
    }
    if (strlen($data['title']) > 100) {
        $errors = 'This title is too long. Please insert an available book title.';
    }
    if (!preg_match('/[a-zA-Z]/',$data['title'])) {
        $errors[] = 'The book title must contain letters.';
    }


    if (empty($data['author'])) {
        $errors[] = 'The author field should not be empty.';
    }
    if (strlen($data['author']) > 100) {
        $errors[] = 'The name of the author is too long.';
    }
    if (!preg_match('/[a-zA-Z]/',$data['author'])) {
        $errors[] = 'The author field must only contain letters.';
    }


    if (empty($data['rate'])) {
        $errors[] = 'The rate field should not be empty.';
    }
    $data['rate'] = (int) $data['rate'];
    if ($data['rate'] === 0) {
        $errors[] = 'The rate field should be grater than 0.';
    }
    if ($data['rate'] > 10) {
        $errors[] = 'The book rate should be minimum 1 and maximum 10.';
    }


    if (empty($data['cover_link'])) {
        $errors[] = 'The cover link field should not be empty.';
    }
    if (strlen($data['cover_link']) > 255) {
        $errors[] = 'The cover link is too long.';
    }


    if (empty($data['intro'])) {
        $errors[] = "The note's intro should not be empty.";
    }


    if (empty($data['body'])) {
        $errors[] = "The note's body should not be empty.";
    }
    return $errors;
}