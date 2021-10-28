<?php


namespace BookNotes\Core\Database;


class QueryBuilder
{
    protected $pdo;
    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insertUser($data) {
        $query = "INSERT INTO users (username, email, password, created_at) VALUES ('{$data['username']}', '{$data['email']}', '{$data['password']}', '{$this->getDate()}')";

        $this->execute($query);;
    }

    public function findUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email='{$email}'";
        $statement = $this->execute($query);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function insertNotes($data) {
        $query = "INSERT INTO notes (id_user, title, author, rate, cover_link, intro, body, created_at) 
        VALUES ('{$data['id_user']}','{$data['title']}','{$data['author']}','{$data['rate']}', '{$data['cover_link']}','{$data['intro']}', '{$data['body']}', '{$this->getDate()}')";

        $this->execute($query);
    }

    public function getDataNotesFromDB() {
        $query = "SELECT * FROM notes";
        $statement = $this->execute($query);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDataNoteById($id)
    {
        $query = "SELECT * FROM notes WHERE id={$id}";
        $statement = $this->execute($query);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getUserDataNotesFromDB($idUser) {
        $query = "SELECT * FROM notes WHERE id_user={$idUser}";
        $statement = $this->execute($query);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertLog(string $ip)  {
        $query = "INSERT INTO logs (ip, created_at) VALUES('$ip', '{$this->getDate()}')";

        $this->execute($query);
    }
    
    private function getDate() {
        return date('Y-m-d H:i:s');
    }

    private function execute(string $query) {
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement;
    }

}

