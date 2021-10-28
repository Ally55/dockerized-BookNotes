<?php

function isAuthenticated () {
    return isset($_SESSION['user']);
}

function authenticateUser($user) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email']
    ];
    header('Location: /library');
    exit;

}